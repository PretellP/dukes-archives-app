<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index()
    {
        return view('home.products.product-details');
    }
}
