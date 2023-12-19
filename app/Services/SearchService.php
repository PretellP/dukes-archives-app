<?php

namespace App\Services;

use App\Models\{Product};
use Auth;
use Exception;
use Illuminate\Http\Request;

class SearchService
{
    public function searchProducts($query)
    {
        return Product::where('name', 'like', "%$query%")->get();
    }

}
