<?php

namespace App\Services;

use App\Models\{Product};
use Auth;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductService
{
    public function getDataTable()
    {
        $query = Product::with([
            'files' => fn ($q) =>
                $q->where('file_type', 'imagenes'),
            'inventory',
            'labels',
        ])
        ->withCount('sales');

        $allProducts = DataTables::of($query)
        ->addColumn('image', function ($product) {
            return '<img class="img-fluid" src="' . $product->files->first()->file_url . '">';
        })
        ->editColumn('name', function ($product) {
            return ' <a class="view_product_btn" href="javascript:void(0);"
                        data-toggle="modal" data-target=""
                        data-url="">' .
                    $product->name
                . '</a>';
        })
        ->editColumn('description', function ($product) {
            return restrictMaxLengthText($product->description, 100);
        })
        ->addColumn('labels.name', function ($product) {
            $labelList = '<ul class="categories-list-table">';

            foreach ($product->labels as $label) {
                $labelList .= '<li> <i class="fa-solid fa-tag me-2"></i>' .
                                    $label->name
                                . '</li>';
            }
            return $labelList .= '</ul>';
        })
        ->editColumn('purchase_price', function ($product) {
            return "<div class='label-price purchase'> S/. "
                        . $product->purchase_price . "
                        <i class='fa-solid fa-money-bill-transfer ms-2'></i>
                    </div>";
        })
        ->editColumn('sale_price', function ($product) {
            return "<div class='label-price sale'> S/. " .
                        $product->sale_price . "
                        <i class='fa-solid fa-money-bill-trend-up ms-2'></i>
                    </div>";
        })
        ->editColumn('status', function ($product) {
            return getStatusButton($product->status);
        })
        ->addColumn('action', function ($product) {
            $btn = '<button data-toggle="modal" data-id="' .
                $product->id . '" data-url=""
                            data-send=""
                            data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                            editProduct"><i class="fa-solid fa-pen-to-square"></i></button>';
            if (
                $product->sales_count == 0
            ) {
                $btn .= '<a href="javascript:void(0)" data-id="' .
                    $product->id . '" data-original-title="delete"
                                data-url="" class="ms-3 edit btn btn-danger btn-sm
                                deleteProduct"><i class="fa-solid fa-trash-can"></i></a>';
            }

            return $btn;
        })
        ->rawColumns(['image', 'name', 'labels.name', 'purchase_price', 'sale_price', 'status', 'action'])
        ->make(true);

        return $allProducts;
    }

    public function store($request, $storage)
    {
        $data = normalizeInputStatus($request->validated());

        if ($product = Product::create($data)) {

            $product->labels()->sync($request['categories']);
            $product->inventory()->create(['quantity' => $request['stock'] ?? 0]);

            foreach ($request->file('images') as $file) {

                $file_type = 'imagenes';
                $category = 'productos';
                $belongsTo = 'productos';
                $relation = 'one_many';

                app(FileService::class)->store(
                    $product,
                    $file_type,
                    $category,
                    $file,
                    $storage,
                    $belongsTo,
                    $relation
                );
            }

            return $product;
        };

        throw new Exception(config('parameters.exception_message'));
    }
}
