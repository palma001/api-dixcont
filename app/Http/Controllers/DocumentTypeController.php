<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $docuemntTypes = DocumentType::filters($request->all())
            ->search($request->all());
        return response()->json($docuemntTypes, 200);
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
        $docuemntType = new DocumentType();
        $docuemntType->name = $request->name;
        $docuemntType->short_name = $request->short_name;
        $docuemntType->description = $request->description;
        $docuemntType->user_created_id = $request->user_created_id;
        $docuemntType->save();
        return response()->json($docuemntType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentType $docuemntType)
    {
        return response()->json($docuemntType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentType $docuemntType)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentType $docuemntType)
    {
        $docuemntType->name = $request->name;
        $docuemntType->short_name = $request->short_name;
        $docuemntType->description = $request->description;
        $docuemntType->user_updated_id = $request->user_updated_id;
        $docuemntType->updated_at = Carbon::now();
        $docuemntType->update();
        return response()->json($docuemntType, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentType $docuemntType)
    {
        $docuemntType->delete();
        return response()->json($docuemntType, 200);
    }
}
