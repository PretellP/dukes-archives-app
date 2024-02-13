<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use Auth;

class HomeController extends Controller
{
    
    public function index()
    {
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
            'shoppingCart'
        ));
    }
}
