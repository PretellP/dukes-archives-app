<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SalesReport;
use App\Http\Controllers\Controller;
use App\Models\{Role, Sale};
use App\Services\{SaleService};
use Illuminate\Http\Request;

class SalesController extends Controller
{
    private $saleService;

    public function __construct(SaleService $service)
    {
        $this->saleService = $service;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->saleService->getDataTable();
        }

        $roles = Role::get(['id', 'name']);
        $genders = config('parameters.genders');
        $document_types = config('parameters.document_types');

        return view('admin.sales.index', compact(
            'roles',
            'genders',
            'document_types'
        ));
    }

    public function exportExcel(Request $request)
    {
        $salesExport = new SalesReport;

        $sales = Sale::with(['user', 'details'])->orderBy('id', 'desc')->limit(500)->get();

        $salesExport->setSales($sales);

        $date_info = 'últimos_500';

        return $salesExport->download(
            'reporte-ventas_'. $date_info .'.xlsx'
        );
    }
}
