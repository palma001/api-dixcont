<?php

namespace App\Http\Controllers;

use App\Models\InvoiceType;
use Illuminate\Http\Request;

class InvoiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(InvoiceType::all(), 200);
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
        $invoiceType = new InvoiceType();
        $invoiceType->name = $request->name;
        $invoiceType->acronym_serie = $request->acronym_serie;
        $invoiceType->user_created_id = $request->user_created_id;
        $invoiceType->save();
        return response()->json($invoiceType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceType $invoiceType)
    {
        return response()->json($invoiceType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceType $invoiceType)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceType $invoiceType)
    {
        $invoiceType->name = $request->name;
        $invoiceType->acronym_serie = $request->acronym_serie;
        $invoiceType->user_updated_id = $request->user_updated_id;
        $invoiceType->update();
        return response()->json($invoiceType, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceType $invoiceType)
    {
        $invoiceType->delete();
        return response()->json($invoiceType, 200);
    }
}
