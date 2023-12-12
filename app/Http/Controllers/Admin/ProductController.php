<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\{ProductRegisterRequest};
use App\Models\Label;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $service)
    {
        $this->productService = $service;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->productService->getDataTable();
        }

        $labels = Label::get(['id', 'name']);

        return view('admin.products.index', compact(
            'labels'
        ));
    }

    public function store(ProductRegisterRequest $request)
    {
        $storage = env('FILESYSTEM_DRIVER');

        try {
            $success = $this->productService->store($request, $storage) ? true : false;
        } catch (Exception $e) {
            $success = false;
        }

        $message = getMessageFromSuccess($success, 'stored');

        return response()->json([
            "success" => $success,
            "message" => $message
        ]);
    }
}
