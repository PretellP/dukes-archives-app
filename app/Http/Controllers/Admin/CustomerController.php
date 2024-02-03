<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
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
}
