<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class CartController extends Controller
{
    public function index()
    {
        $wishlistCount = 0;

        if (Auth::check()) {
            $user = Auth::user();
            $wishlistCount = $user->desired()->count();
        } 
        return view('home.cart', compact(
            'wishlistCount'
        ));
    }
}
