<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\{ProductRequest};
use App\Models\Label;
use App\Models\{Product};
use App\Services\{ProductService};
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

    public function store(ProductRequest $request)
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

    public function edit(Product $product)
    {
        $product->loadFiles()->load(['labels:id', 'inventory']);

        $product['labels_ids'] = $product->labels->pluck('id');
        $product['stock'] = $product->inventory->quantity;

        return response()->json([
            'files' => $product->files->pluck('file_url'),
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $storage = env('FILESYSTEM_DRIVER');

        $product->loadFiles();

        try {
            $success = $this->productService->update($request, $product, $storage);
        } catch (Exception $e) {
            $success = false;
        }

        $message = getMessageFromSuccess($success, 'updated');

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }

    public function destroy(Product $product)
    {
        $storage = env('FILESYSTEM_DRIVER');

        $product->loadFiles();

        try {
            $success = $this->productService->destroy($product, $storage);
        } catch (Exception $e) {
            $success = false;
        }

        $message = getMessageFromSuccess($success, 'deleted');

        return response()->json([
            'success' => $success,
            'message' =>$message
        ]);
    }
}
