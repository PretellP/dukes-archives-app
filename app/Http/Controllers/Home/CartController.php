<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Role, User, Product};
use Auth;

class CartController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $shoppingCart = collect();
        $wishlistCount = 0;

        if ($user) {

            $shoppingCart = $user->shoppingCart()->with('files')->get();
            $CartProductsIds = array();

            if ($shoppingCart->isNotEmpty()) {
                foreach ($shoppingCart as $product) {
                    array_push($CartProductsIds, $product->id);
                }
            }


            $wishlistCount = 0;
            $wishlistCount = $user->desired()->count();

        }


        return view('home.cart', [
            'shoppingCart' => $shoppingCart,
            'wishlistCount' => $wishlistCount
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $quantity = $request['value'];
        $subtotal = 0;
        $total = 0;

        // Validación de la cantidad (puedes personalizarla según tus necesidades)
        if ($quantity < 0) {
            $success = false;
        } else {

            // Actualizar la cantidad en la base de datos
            $user = Auth::user();

            $user->shoppingCart()->updateExistingPivot($product, ['quantity' => $quantity]);
            $user->load('shoppingCart');

            $total = $user->shoppingCart->sum(function ($product) {
                return $product->sale_price * $product->pivot->quantity;
            });
            // Obtener el nuevo total
            $subtotal = $product->sale_price * $quantity;
            $success= true;
        }

        return response()->json([
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'success' => $success
        ]);
    }

    public function agregar(Product $p)
    {
        $user = Auth::user();

        $shoppingCart = $user->shoppingCart()->find($p->id);

        if ($shoppingCart) {
            $user->shoppingCart()->updateExistingPivot($p, [
                'quantity' => $shoppingCart->pivot->quantity + 1
            ]);
        } else {
            $user->shoppingCart()->attach($p, [
                'quantity' => 1
            ]);
        }

        $shoppingCart = $user->shoppingCart()->sum('quantity');



        //return response()->json(['count' => $wishlist]);
        return redirect()->route('home.shop.index');

        //return response()->json([
        //    "success" => "Producto agregado a la lista de deseos",
        //    "wishlistCount" => $wishlistCount
        //]);
    }

    public function addAll(Request $request)
    {
        $user = Auth::user();
        $desiredProducts = $user->desired()->get();
        $quantities = $request->input('quantities', []);
    
        foreach ($desiredProducts as $product) {
            $quantity = $quantities[$product->id] ?? 0; // Obtiene la cantidad para este producto
            if ($quantity > 0) {
                $user->shoppingCart()->attach($product->id, ['quantity' => $quantity]);
            }
        }
    
        $user->desired()->detach();
        return response()->json([
            'success' => true,
        ]);
    }

    public function eliminar(Product $p)
    {

        $user = Auth::user();

        $user->shoppingCart()->detach($p);
        return redirect()->back();
    }

    public function vaciar()
    {

        $user = Auth::user();

        $user->shoppingCart()->detach();
        return redirect()->back();
    }

    public function goCheckout()
    {
        $user = Auth::user();
        $shoppingCart = $user->shoppingCart;

        $total = $shoppingCart->sum(function ($item) {
            return $item->sale_price * $item->pivot->quantity;
        });

        dd($shoppingCart, $total);
        return view('', [
            'shoppingCart' => $shoppingCart,
            'total' => $total,
        ]);
    }
}
