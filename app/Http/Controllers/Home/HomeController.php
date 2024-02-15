<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Announcement, User, Product, Label};
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        $labels = Label::with(['products' => fn ($q) =>
            $q->with([
                'files' => fn ($q) => $q
                    ->where('file_type', 'imagenes')
            ])
        ])
        ->has('products')
        ->get();

        $banners = Announcement::with('file')->get();

        $shoppingCart = collect();
        $wishlistCount = 0;
        $user = Auth::user();

        if ($user) {
            $shoppingCart = $user->shoppingCart()->with('files')->get();
            $CartProductsIds = array();

            $wishlistCount = $user->desired()->count();
        }

        // dd($labels);

        return view('home.index', compact(
            'wishlistCount',
            'shoppingCart',
            'labels',
            'banners'
        ));
    }
}
