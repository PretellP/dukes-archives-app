<?php

namespace App\Services;

use App\Models\{Sale};
use Auth;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SaleService
{
    public function getDataTable()
    {
        $query = Sale::with(['user', 'details'])
                    ->select('sales.*');

        $allSales = DataTables::of($query)
            ->editColumn('user.name', function ($sale) {

                $user = $sale->user;

                return ' <a class="view_user_btn" href="javascript:void(0);"
                        data-toggle="modal" data-target="#viewUserModal"
                        data-url="' . route('admin.users.show', $user) . '">' .
                    $user->full_name
                    . '</a>';
            })
            ->addColumn('qtty_products', function ($sale) {

                $qtty = $sale->details->sum(function ($product) {
                    return $product->pivot->quantity;
                });
                return $qtty;
            })
            ->addColumn('total_amount', function ($sale) {

                $amount = $sale->details->sum(function ($product) {
                    $unit_price = $product->sale_price;
                    return $unit_price * $product->pivot->quantity;
                });
                return 'S/.'. round($amount, 2);
            })
            ->addColumn('total_worth', function ($sale) {

                $amount = $sale->details->sum(function ($product) {
                    $unit_price = $product->sale_price;
                    return $unit_price * $product->pivot->quantity;
                });

                $purchase_price = $sale->details->sum(function ($product) {
                    $unit_price = $product->purchase_price;
                    return $unit_price * $product->pivot->quantity;
                });

                return 'S/.'. round(($amount - $purchase_price), 2);
            })
            ->rawColumns(['user.name'])
            ->make(true);

        return $allSales;
    }
}
