<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Product, Label};
use Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        
        $products= Product::with([
                'labels',
                'files' => fn ($q) => $q->where('file_type', 'imagenes')
            ])
            ->paginate(
                $perPage = 9, $columns = ['*'],$pageName = 'shop'
            );
        $labels = Label::with('products')->get(['id', 'name']);
        $shoppingCart = collect();
        $wishlistCount = 0;
        $user = Auth::user();

        if ($user) {
            $shoppingCart = $user->shoppingCart()->with('files')->get();
            $CartProductsIds = array();

            $wishlistCount = $user->desired()->count();
        }
        
        return view('home.index', compact(
            'wishlistCount',
            'products',
            'labels',
            'shoppingCart'
        ));
    }
}
