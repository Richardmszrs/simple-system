<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests\Invoices\InvoiceStore;
use App\Http\Requests\Invoices\InvoiceUpdate;
use DB;
use PDF;

class InvoiceController extends Controller
{

    /**
     *
     */
    public function index()
    {

        return view('invoices.index', [
            'invoices' => Invoice::all(),
        ]);
    }

    /**
     *
     */
    public function create($client_id = null)
    {
        $clients = Client::orderBy('firstname')->get();

        return view('invoices.create', [
            'invoice' => new Invoice(),
            'client_id' => $client_id,
            'clients' => $clients
        ]);
    }

//    public function create()
//    {
//        return view('invoices.create', [
//            'invoice' => new Invoice(),
//            'clients' => Client::getSelectbox(),
//        ]);
//    }
    public function store(InvoiceStore $request)
    {
        $invoice = Invoice::create([
            'clients_id' => $request->input('clients_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
        ]);

        return redirect()->route('invoice')->with('success', ['The Invoice has been created successfully.']);
    }

    public function edit(Invoice $invoice, $client_id = null)
    {
        $clients = Client::orderBy('firstname')->get();

        return view('invoices.edit', [
            'invoice' => $invoice,
            'client_id' => $client_id,
            'clients' => $clients,
        ]);
    }

//    public function edit(\App\Models\Invoice $invoice)
//    {
//        // refactor
//        $clients = Client::orderBy('firstname')->get();
//
//        return view('invoice.edit', compact('invoice', 'clients'));
//    }

    public function update(InvoiceUpdate $request, \App\Models\Invoice $invoice)
    {
        $invoice->clients_id = $request->input('clients_id');
        $invoice->name = $request->input('name');
        $invoice->description = $request->input('description');
        $invoice->amount = $request->input('amount');

        $invoice->save();

        return redirect()->route('invoice')->with('success', ['The invoice has been successfully update.']);
    }

    /**
     * removes Invoice from system
     */
    public function destroy(\App\Models\Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoice')->with('success', ['The project was removed from the system.']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $items = DB::table("invoices")->get();
        view()->share('invoices',$items);

        if($request->has('download')){
            $pdf = PDF::loadView('invoices.pdf');
            return $pdf->download('pdfview.pdf');
        }

        return view('pdfview');
    }
}
