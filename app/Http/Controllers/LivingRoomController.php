<?php

namespace App\Http\Controllers;

use App\Models\LivingRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LivingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $livingRooms = LivingRoom::filters($request->all())
            ->with('tables')
            ->search($request->all());
        return response()->json($livingRooms, 200);
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
        $livingRoom = new LivingRoom();
        $livingRoom->name = $request->name;
        $livingRoom->user_created_id = $request->user_created_id;
        $livingRoom->save();
        return response()->json($livingRoom, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LivingRoom $livingRoom)
    {
        return response()->json($livingRoom, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LivingRoom $livingRoom)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LivingRoom $livingRoom)
    {
        $livingRoom->name = $request->name;
        $livingRoom->user_updated_id = $request->user_updated_id;
        $livingRoom->updated_at = Carbon::now();
        $livingRoom->update();
        return response()->json($livingRoom, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LivingRoom $livingRoom)
    {
        $livingRoom->delete();
        return response()->json($livingRoom, 200);
    }
}
