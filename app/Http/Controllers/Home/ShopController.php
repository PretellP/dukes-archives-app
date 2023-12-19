<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products= Product::with('labels')->get();
        
        return view('home.products.shop', ['products' => $products]);
    }
}
