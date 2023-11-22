<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Aws\Api\Service;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productService;
    public function __construct(ProductService $service)
    {
        $this->productService=$service;
    }

}
