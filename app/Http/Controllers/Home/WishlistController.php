<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Role, User, Product};
use Auth;
class WishlistController extends Controller
{
    public function index()
    {
        //return view('home.profile.wishlist');
        $wishlistCount = 0;
        $user = Auth::user();

        $desired = collect();
        $CartProductsIds = array();

        $wishlistCount = 0;
        $total_price = 0;

        if ($user) {

            $desired=$user->desired;

            if($desired->isNotEmpty())
            {
                foreach($desired as $product)
                {
                    array_push($CartProductsIds, $product->id);
                }

                $total_amount = $desired->sum(function ($product) {
                    return $product->sale_price;
                });
                $total_qtty = $desired->sum(function ($product) {
                    return $product->pivot->quantity;
                });

                $total_price = $total_amount * $total_qtty;

            }

            $wishlistCount = $user->desired()->count();
        }

        $products=Product::whereNotIn('id', $CartProductsIds)->get();

        return view('home.profile.wishlist',[
                'products' => $products,
                'desired' => $desired,
                'total_price' => $total_price,
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

        $user->desired()->updateExistingPivot($product, ['quantity' => $quantity]);
        $user->load('desired');

        $total = $user->desired->sum(function ($product) {
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
        $user=Auth::user();

        //$wishlist = $user->desired()->count()->find($p->id);
        $wishlist = $user->desired()->find($p->id);

        if ($wishlist) {
            // Si el producto ya está en la lista de deseos, incrementa la cantidad
            $user->desired()->updateExistingPivot($p, [
                'quantity' => $wishlist->pivot->quantity + 1
            ]);
        } else {
            // Si el producto no está en la lista de deseos, agrégalo con cantidad 1
            $user->desired()->attach($p, [
                'quantity' => 1
            ]);
        }

        $wishlist = $user->desired()->sum('quantity');

        $html = view('home')->render();

        

        //return response()->json(['count' => $wishlist]);
        return redirect()->route('home.shop.index');
        //return response()->json([
        //    "success" => "Producto agregado a la lista de deseos",
        //    "wishlistCount" => $wishlistCount
        //]);
    }

    public function eliminar(Product $p){

        $user=Auth::user();

        $user->desired()->detach($p);
        return redirect()->back();
    }
}
