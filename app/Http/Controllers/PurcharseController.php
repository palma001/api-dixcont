<?php

namespace App\Http\Controllers;

use App\Http\Resources\PurcharseResource;
use App\Models\Purcharse;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $purcharses = Purcharse::filters($request->all())
            ->with(
                'provider:id,name,document_number',
                'products',
                'coin:id,name,symbol',
                'invoiceType:id,name',
                'purchasePayments.paymentMethod:id,name'
            )
            ->search($request->all());
        return response()->json($purcharses, 200);
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
        $purcharse = new Purcharse();
        $purcharse->exchange_rate = $request->exchange_rate;
        $purcharse->invoice_type_id = $request->invoice_type_id;
        $purcharse->coin_id = $request->coin_id;
        $purcharse->provider_id = $request->provider_id;
        $purcharse->user_created_id = $request->user_created_id;
        $purcharse->save();
        return new PurcharseResource($purcharse);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Purcharse $purcharse)
    {
        return new PurcharseResource($purcharse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Purcharse $purcharse)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purcharse $purcharse)
    {
        $purcharse->exchange_rate = $request->exchange_rate;
        $purcharse->invoice_type_id = $request->invoice_type_id;
        $purcharse->coin_id = $request->coin_id;
        $purcharse->provider_id = $request->provider_id;
        $purcharse->user_updated_id = $request->user_updated_id;
        $purcharse->update();
        return response()->json($purcharse, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purcharse $purcharse)
    {
        $purcharse->delete();
        return response()->json($purcharse, 200);
    }
}
