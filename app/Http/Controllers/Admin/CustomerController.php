<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CustomersReport;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Services\{CustomerService};
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(CustomerService $service)
    {
        $this->customerService = $service;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->customerService->getDataTable();
        }

        $roles = Role::get(['id', 'name']);
        $genders = config('parameters.genders');
        $document_types = config('parameters.document_types');


        return view('admin.customers.index', compact(
            'roles',
            'genders',
            'document_types'
        ));
    }

    public function exportExcel(Request $request)
    {
        $customersReport = new CustomersReport;

        $customers = User::with('role')
            ->whereHas('role', function ($q) {
                $q->where('name', 'CLIENTE');
            })->orderBy('id', 'desc')->limit(500)->get();

        $customersReport->setCustomers($customers);

        $date_info = 'últimos_500';

        return $customersReport->download(
            'reporte-clientes_' . $date_info . '_'. time() .'.xlsx'
        );
    }
}
