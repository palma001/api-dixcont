<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoicePaymentRequest;
use App\Http\Requests\UpdateInvoicePaymentRequest;
use App\Models\InvoicePayment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoicePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoicePayments = InvoicePayment::filters($request->all())
            ->betweenDate($request->all())
            ->filterWhereIn($request->all())
            ->with('invoice:id', 'paymentMethod:id,name', 'coin:id,name')
            ->search($request->all());
        return response()->json($invoicePayments, 200);
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
     * @param  \App\Http\Requests\StoreInvoicePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoicePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoicePayment  $invoicePayment
     * @return \Illuminate\Http\Response
     */
    public function show(InvoicePayment $invoicePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoicePayment  $invoicePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoicePayment $invoicePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoicePaymentRequest  $request
     * @param  \App\Models\InvoicePayment  $invoicePayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoicePaymentRequest $request, InvoicePayment $invoicePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoicePayment  $invoicePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoicePayment $invoicePayment)
    {
        //
    }
}
