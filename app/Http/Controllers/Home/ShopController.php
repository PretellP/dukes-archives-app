<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\{Label, Product};
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products= Product::with([
                'labels',
                'files' => fn ($q) => $q->where('file_type', 'imagenes')
            ])
            ->get();
        $labels = Label::get(['id', 'name']);

        return view('home.products.shop', compact(
            'products',
            'labels'
        ));
    }
}
