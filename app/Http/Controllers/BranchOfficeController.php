<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use Illuminate\Http\Request;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branchOffices = BranchOffice::filters($request->all())
            ->search($request->all());
        return response()->json($branchOffices, 200);
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
        $branchOffice = new BranchOffice();
        $branchOffice->name = $request->name;
        $branchOffice->document_number = $request->document_number;
        $branchOffice->phone_number = $request->phone_number;
        $branchOffice->address = $request->address;
        $branchOffice->email = $request->email;
        $branchOffice->company_id = $request->company_id;
        $branchOffice->user_created_id = $request->user_created_id;
        $branchOffice->save();
        return response()->json($branchOffice, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BranchOffice $branchOffice)
    {
        return response()->json($branchOffice, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchOffice $branchOffice)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BranchOffice $branchOffice)
    {
        $branchOffice->name = $request->name;
        $branchOffice->document_number = $request->document_number;
        $branchOffice->phone_number = $request->phone_number;
        $branchOffice->address = $request->address;
        $branchOffice->email = $request->email;
        $branchOffice->company_id = $request->company_id;
        $branchOffice->user_updated_id = $request->user_updated_id;
        $branchOffice->update();
        return response()->json($branchOffice, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchOffice $branchOffice)
    {
        $branchOffice->delete();
        return response()->json($branchOffice, 200);
    }
}
