<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use Illuminate\Http\Request;

class TaxeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $taxes = Taxe::filters($request->all())
            ->search($request->all());
        return response()->json($taxes, 200);
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
        $taxe = new Taxe();
        $taxe->name = $request->name;
        $taxe->amount = $request->amount;
        $taxe->user_created_id = $request->user_created_id;
        $taxe->save();
        return response()->json($taxe, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Taxe $taxe)
    {
        return response()->json($taxe, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxe $taxe)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxe $taxe)
    {
        $taxe->name = $request->name;
        $taxe->amount = $request->amount;
        $taxe->user_updated_id = $request->user_updated_id;
        $taxe->update();
        return response()->json($taxe, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxe $taxe)
    {
        $taxe->delete();
        return response()->json($taxe, 200);
    }
}
