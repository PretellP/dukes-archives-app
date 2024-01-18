<?php

namespace App\Http\Controllers\home;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use App\Models\{Label, Product, User};
use Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $wishlistCount = 0;
        $products= Product::with([
                'labels',
                'files' => fn ($q) => $q->where('file_type', 'imagenes')
            ])
            ->paginate(
                $perPage = 9, $columns = ['*'],$pageName = 'shop'
            );
        $labels = Label::get(['id', 'name']);

        $wishlistCount = 0;
        if (Auth::check()) {
            $user = Auth::user();
            $wishlistCount = $user->desired()->count();
        }    

        return view('home.products.shop', compact(
            'products',
            'labels',
            'wishlistCount'
        ));
    }
    public function show(Product $product)
    {
        $productDetails = $product->load([
            'labels',
            'files' => fn ($q) => $q->where('file_type', 'imagenes')
        ]);

        $htmlImages = view('home.products.components._product-view-images', compact('productDetails'))->render();

        $wishlistCount = 0;

        if (Auth::check()) {
            $user = Auth::user();
            $wishlistCount = $user->desired()->count();
        }

        return response()->json([
            "product" => $productDetails,
            "html" => $htmlImages,
            'wishlistCount' => $wishlistCount
        ]);
    }

}
