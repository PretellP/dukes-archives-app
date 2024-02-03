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
        //return view('home.profile.wishlist');
        $user = Auth::user();
        $shoppingCart=$user->shoppingCart;
        $CartProductsIds = array();

        if($shoppingCart->isNotEmpty())
            {
                foreach($shoppingCart as $product)
                {
                    array_push($CartProductsIds,$product->id);
                }
            }

            
            //$products=Product::whereNotIn('id',$CartProductsIds)->get();


            $wishlistCount = 0;
            $wishlistCount = $user->desired()->count();
      
            return view('home.cart',[
                    'shoppingCart' => $shoppingCart,
                    'wishlistCount' => $wishlistCount
            ]);
    }

    public function update(Request $request, Product $product)
    {
        $quantity = $request->input('quantity');

        // Validación de la cantidad (puedes personalizarla según tus necesidades)
        if ($quantity <= 0) {
            return response()->json(['error' => 'La cantidad debe ser mayor que cero'], 400);
        }

        // Actualizar la cantidad en la base de datos
        $user = Auth::user();
        $shoppingCart=$user->shoppingCart;
        $shoppingCart->updateExistingPivot($product, ['quantity' => $quantity]);

        // Obtener el nuevo total
        $total = $product->sale_price * $quantity;

        return response()->json(['total' => $total]);
        
    }

    public function agregar(Product $p)
    {   
        $user=Auth::user();

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

    public function eliminar(Product $p){
        
        $user=Auth::user();

        $user->shoppingCart()->detach($p);
        return redirect()->back();
    }

    public function vaciar(){
        
        $user=Auth::user();

        $user->shoppingCart()->detach();
        return redirect()->back();
    }

    public function goCheckout() {
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
