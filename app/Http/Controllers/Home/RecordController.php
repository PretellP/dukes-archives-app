<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Sale, Product};
use Auth;
use Barryvdh\DomPDF\Facade\PDF;

class RecordController extends Controller
{
    public function index()
    {
        $wishlistCount = 0;

        if (Auth::check()) {
            $user = Auth::user();
            $wishlistCount = $user->desired()->count();
            $sales = Sale::with('details')->where('user_id', $user->id)->get();
        } 
        return view('home.profile.order', compact(
            'wishlistCount',
            'sales'
        ));
    }

    public function pdf(Sale $item)
    {
        $user = Auth::user();
        $invoice = Sale::with(['details', 'user'])->where('id', $item->id)->where('user_id', $user->id)->first();       
        $pdf = PDF::loadView('home.profile.invoice', compact(
            'invoice'
        ));

        $pdf_name = 'Comprobante.pdf';
        return $pdf->stream($pdf_name);
        //return $pdf->download($pdf_name);
        //return view ('reports.induccion');
    }
}
