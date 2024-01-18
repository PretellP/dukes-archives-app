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
        $desired=$user->desired;
        $CartProductsIds = array();

       if($desired->isNotEmpty())
            {
                foreach($desired as $product)
                {
                    array_push($CartProductsIds,$product->id);
                }
            }

            
            $products=Product::whereNotIn('id',$CartProductsIds)->get();
            
            $wishlistCount = $user->desired()->count();

            return view('home.profile.wishlist',[
                    'products' => $products,
                    'desired' => $desired,
                    'wishlistCount' => $wishlistCount
            ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
    
        $product = Product::find($productId);
        if ($product) {
            $subtotal = $product->sale_price * $quantity;
        }
    
        $user->desired()->updateExistingPivot($productId, ['quantity' => $quantity]);
    
        $desiredItems = $user->desired;
        $newTotal = $desiredItems->sum(function ($desiredItem) {
            return $desiredItem->sale_price * $desiredItem->pivot->quantity;
        });
    
        return response()->json([
            'total' => number_format($newTotal, 2),
            'subtotal' => number_format($subtotal, 2)
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
