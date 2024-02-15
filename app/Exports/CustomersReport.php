<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CustomersReport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $customers;

    public function view(): View
    {
        return view('admin.customers.exports._customers_export', [
            'customers' => $this->customers
        ]);
    }

    public function setCustomers($customers)
    {
        $this->customers = $customers;
    }
}
