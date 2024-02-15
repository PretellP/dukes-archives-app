<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
class ProductDetailsController extends Controller
{
    public function index(Product $product)
    {
        $wishlistCount = 0;

        $productDetails = $product->load([
            'labels',
            'files' => fn ($q) => $q->where('file_type', 'imagenes'),
            'inventory'
        ]);

        if (Auth::check()) {
            $user = Auth::user();
            $wishlistCount = $user->desired()->count();
        }

        return view('home.products.product-details-view', compact(
            'productDetails',
            'wishlistCount'
        ));
    }

}
