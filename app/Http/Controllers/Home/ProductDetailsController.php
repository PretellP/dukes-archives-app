<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Product};
use Auth;
class ProductDetailsController extends Controller
{
    public function index(Product $product)
    {
        $wishlistCount = 0;

        if (Auth::check()) {
            $user = Auth::user();
            $wishlistCount = $user->desired()->count();
        }

        $productDetails = $product->load([
            'labels',
            'files' => fn ($q) => $q->where('file_type', 'imagenes')
        ]);
    
        if (!$productDetails) {
            abort(404); 
        }

        return view('home.products.product-details-view', compact('productDetails','wishlistCount'));
    }

}
