<?php

namespace App\Services;

use App\Models\{Product, User};
use Auth;
use Exception;
use Illuminate\Http\Request;
use LaravelMercadoPago\Facades\MercadoPago;

class ShoppingCartService
{
    public function initializeMercadoPago($shoppingCart)
    {
        MercadoPago::initSdk(config('services.mercadopago.token'));
        $preference = MercadoPago::preference();

        $preference->auto_return = 'approved';
        $preference->back_urls = [
            'success' => route('home.cart.processSell')
        ];

        $mp_items_array = array();

        foreach ($shoppingCart as $product) {

            $item = MercadoPago::item();
            $item->title = $product->name;
            $item->quantity = $product->pivot->quantity;
            $item->unit_price = $product->sale_price;

            $mp_items_array[] = $item;
        }

        $preference->items = $mp_items_array;
        $preference->save();

        return $preference;
    }

    public function updateQttyCart(Product $product, $quantity)
    {
        $user = Auth::user();

        $user->shoppingCart()->updateExistingPivot($product, ['quantity' => $quantity]);
        $user->load('shoppingCart');

        $total = $user->shoppingCart->sum(function ($product) {
            return $product->sale_price * $product->pivot->quantity;
        });

        $subtotal = $product->sale_price * $quantity;

        return [$total, $subtotal];
    }

    public function processSale(User $user, $products)
    {
        if ($sale = $user->orders()->create([
            'date' => getCurrentDate(),
            'hour' => getCurrentTime(),
        ]))
        {
            foreach ($products as $product) {

                $sale->details()->attach($product, [
                    'quantity' => $product->pivot->quantity,
                ]);

                $newQtty = $product->inventory->quantity - $product->pivot->quantity;
                $product->inventory->update([
                    'quantity' => $newQtty < 0 ? 0 : $newQtty,
                ]);
            }

            $user->shoppingCart()->detach();

            return true;
        }

        return false;
    }
}
