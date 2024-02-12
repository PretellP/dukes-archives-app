<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Sale, Product};
use Auth;
class RecordController extends Controller
{
    public function index()
    {
        $wishlistCount = 0;

        if (Auth::check()) {
            $user = Auth::user();
            $wishlistCount = $user->desired()->count();
        } 
        return view('home.profile.order', compact(
            'wishlistCount'
        ));
    }
}
