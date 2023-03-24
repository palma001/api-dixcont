<?php

namespace App\Http\Controllers;

use App\Models\PurcharsePayment;
use App\Http\Requests\StorePurcharsePaymentRequest;
use App\Http\Requests\UpdatePurcharsePaymentRequest;

class PurcharsePaymentController extends Controller
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
     * @param  \App\Http\Requests\StorePurcharsePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurcharsePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurcharsePayment  $purcharsePayment
     * @return \Illuminate\Http\Response
     */
    public function show(PurcharsePayment $purcharsePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurcharsePayment  $purcharsePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(PurcharsePayment $purcharsePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurcharsePaymentRequest  $request
     * @param  \App\Models\PurcharsePayment  $purcharsePayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurcharsePaymentRequest $request, PurcharsePayment $purcharsePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurcharsePayment  $purcharsePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurcharsePayment $purcharsePayment)
    {
        //
    }
}
