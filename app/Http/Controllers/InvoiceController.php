<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Invoice::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->exchange_rate = $request->exchange_rate;
        $invoice->invoice_type_id = $request->invoice_type_id;
        $invoice->coin_id = $request->coin_id;
        $invoice->client_id = $request->client_id;
        $invoice->seller_id = $request->seller_id;
        $invoice->user_created_id = $request->user_created_id;
        $invoice->save();
        return response()->json($invoice, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return response()->json($invoice, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->exchange_rate = $request->exchange_rate;
        $invoice->invoice_type_id = $request->invoice_type_id;
        $invoice->coin_id = $request->coin_id;
        $invoice->client_id = $request->client_id;
        $invoice->seller_id = $request->seller_id;
        $invoice->user_created_id = $request->user_created_id;
        $invoice->update();
        return response()->json($invoice, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return response()->json($invoice, 200);
    }
}
