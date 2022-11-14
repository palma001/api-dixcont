<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceTypeRequest;
use App\Http\Requests\UpdateInvoiceTypeRequest;
use App\Models\InvoiceType;

class InvoiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreInvoiceTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceType  $invoiceType
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceType $invoiceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceType  $invoiceType
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceType $invoiceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceTypeRequest  $request
     * @param  \App\Models\InvoiceType  $invoiceType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceTypeRequest $request, InvoiceType $invoiceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceType  $invoiceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceType $invoiceType)
    {
        //
    }
}
