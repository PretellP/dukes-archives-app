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
        $wishlistCount = 0;

        if (Auth::check()) {
            $user = Auth::user();
            $wishlistCount = $user->desired()->count();
        }
        
        return view('home.index', compact('wishlistCount'));
    }
}
