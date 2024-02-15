<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SalesReport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $sales;

    public function view(): View
    {
        return view('admin.sales.exports._sales_export', [
            'sales' => $this->sales
        ]);
    }

    public function setSales($sales)
    {
        $this->sales = $sales;
    }
}
