<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Sale};
use App\Services\ShoppingCartService;
use Illuminate\Support\Facades\Http;
use Auth;
use Exception;

class CartController extends Controller
{
    private $shoppingCartService;

    public function __construct(ShoppingCartService $service)
    {
        $this->shoppingCartService = $service;
    }

    public function index()
    {
        $shoppingCart = collect();
        $wishlistCount = 0;

        $user = Auth::user();

        if ($user) {

            $shoppingCart = $user->shoppingCart()->with('files')->get();
            $CartProductsIds = array();

            $wishlistCount = 0;
            $wishlistCount = $user->desired()->count();
        }

        $preference = $this->shoppingCartService->initializeMercadoPago($shoppingCart);

        return view('home.cart.index', compact(
            'shoppingCart',
            'wishlistCount',
            'preference'
        ));
    }

    public function update(Request $request, Product $product)
    {
        $quantity = $request['value'];
        $subtotal = 0;
        $total = 0;

        if ($quantity < 1) {
            $success = false;
        } else {

            try {
                [$total, $subtotal] = $this->shoppingCartService->updateQttyCart($product, $quantity);
                $success= true;
            } catch (Exception $e) {
                $success = false;
            }
        }

        $user= Auth::user();

        $shoppingCart = $user->shoppingCart()->get();
        $preference = $this->shoppingCartService->initializeMercadoPago($shoppingCart);

        return response()->json([
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'success' => $success,
            'key' => config('services.mercadopago.key'),
            'id' => $preference->id
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

    public function paymentSuccess(Request $request)
    {
        return view('home.cart.payment_success');
    }


    public function processSell(Request $request)
    {
        $py_id = $request['payment_id'];
        $response = Http::get('https://api.mercadopago.com/v1/payments/' . $py_id . '?access_token=' . config('services.mercadopago.token'));
        $response = json_decode($response);
        $status = $response->status;
        $user = Auth::user();

        if ($status == 'approved') {

            $user->load(['shoppingCart.inventory']);

            $products = $user->shoppingCart;

            if ($this->shoppingCartService->processSale($user, $products)) {
                return redirect()->route('home.cart.paymentSuccess');
            }
        }

        abort(403, 'Página no encontrada');
    }
}
