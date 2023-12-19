<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\SearchService;
use Aws\Api\Service;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;

class ProductsController extends Controller
{
    private $productService;
    public function __construct(SearchService $service)
    {
        $this->productService=$service;
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('query');
            $products = $this->productService->searchProducts($query);

            
            if ($products->isEmpty()) {               
                return response()->json(['message' => 'No se encontraron productos ...porque no hay XD.']);
            }

            return response()->json($products);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'trace' => $e->getTrace()], 500);
        }
    }

}
