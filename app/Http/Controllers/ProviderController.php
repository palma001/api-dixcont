<?php

namespace App\Http\Controllers;

use App\Helpers\RoleAcronym;
use App\Models\Provider;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    protected $role;

    public function __construct()
    {
        $this->role = Role::where('acronym', RoleAcronym::PROVIDER)->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $providers = Provider::filters($request->all())
            ->where('role_id', $this->role->id)
            ->search($request->all());
        return response()->json($providers, 200);
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
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->document_number = $request->document_number;
        $provider->phone_number = $request->phone_number;
        $provider->address = $request->address;
        $provider->document_type_id = $request->document_type_id;
        $provider->username = $request->username;
        $provider->role_id = $this->role->id;
        $provider->email = $request->email;
        $provider->user_created_id = $request->user_created_id;
        $provider->password = Hash::make($request->password);
        $provider->save();
        return response()->json($provider, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return response()->json($provider, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $provider->name = $request->name;
        $provider->document_number = $request->document_number;
        $provider->phone_number = $request->phone_number;
        $provider->address = $request->address;
        $provider->document_type_id = $request->document_type_id;
        $provider->username = $request->username;
        $provider->email = $request->email;
        $provider->user_updated_id = $request->user_updated_id;
         if ($request->password) {
            $provider->password = Hash::make($request->password);
        }
        $provider->update();
        return response()->json($provider, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return response()->json($provider, 200);
    }
}
