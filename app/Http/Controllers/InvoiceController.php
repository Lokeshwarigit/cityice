<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice; // <-- Make sure this is added
use Illuminate\Support\Facades\DB;


class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index');
    }

    public function fetch()
    {
        return response()->json(Invoice::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'app_date' => 'required|date',
            'app_time' => 'required',
            'services' => 'required',
        ]);

        Invoice::create($request->all());

        return response()->json(['success' => true]);
    }
   
    public function getInvoices()
    {
        $invoices = DB::table('invoices')->select(
            'id',
            'invoice_no',
            'invoice_date',
            'name',
            'contact_no',
            'address',
            'servicing_date',
            'servicing_by',
            'payment_mode'
        )->get();

        return response()->json(['data' => $invoices]);
    }
    
    

}


