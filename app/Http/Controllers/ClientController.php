<?php

namespace App\Http\Controllers;

use App\Helpers\RoleAcronym;
use App\Models\Client;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    protected $role;

    public function __construct()
    {
        $this->role = Role::where('acronym', RoleAcronym::CLIENT)->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::filters($request->all())
            ->where('role_id', $this->role->id)
            ->search($request->all());
        return response()->json($clients, 200);
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
        $client = new Client();
        $client->name = $request->name;
        $client->document_number = $request->document_number;
        $client->phone_number = $request->phone_number;
        $client->address = $request->address;
        $client->document_type_id = $request->document_type_id;
        $client->username = $request->username;
        $client->role_id = $this->role->id;
        $client->email = $request->email;
        $client->user_created_id = $request->user_created_id;
        $client->password = Hash::make($request->password);
        $client->save();
        return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return response()->json($client, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->name;
        $client->document_number = $request->document_number;
        $client->phone_number = $request->phone_number;
        $client->address = $request->address;
        $client->document_type_id = $request->document_type_id;
        $client->username = $request->username;
        $client->email = $request->email;
        $client->user_updated_id = $request->user_updated_id;
         if ($request->password) {
            $client->password = Hash::make($request->password);
        }
        $client->update();
        return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json($client, 200);
    }
}
