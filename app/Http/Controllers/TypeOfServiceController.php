<?php

namespace App\Http\Controllers;

use App\Models\TypeOfService;
use Illuminate\Http\Request;

class TypeOfServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $typeOfServices = TypeOfService::filters($request->all())
            ->search($request->all());
        return response()->json($typeOfServices, 200);
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
        $typeOfService = new TypeOfService();
        $typeOfService->name = $request->name;
        $typeOfService->user_created_id = $request->user_created_id;
        $typeOfService->save();
        return response()->json($typeOfService, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfService $typeOfService)
    {
        return response()->json($typeOfService, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfService $typeOfService)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeOfService $typeOfService)
    {
        $typeOfService->name = $request->name;
        $typeOfService->user_updated_id = $request->user_updated_id;
        $typeOfService->update();
        return response()->json($typeOfService, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfService $typeOfService)
    {
        $typeOfService->delete();
        return response()->json($typeOfService, 200);
    }
}
