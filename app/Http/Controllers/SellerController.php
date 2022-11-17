<?php

namespace App\Http\Controllers;

use App\Helpers\RoleAcronym;
use App\Models\Role;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    protected $role;

    public function __construct()
    {
        $this->role = Role::where('acronym', RoleAcronym::SELLER)->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sellers = Seller::filters($request->all())
            ->where('role_id', $this->role->id)
            ->search($request->all());
        return response()->json($sellers, 200);
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
        $seller = new Seller();
        $seller->name = $request->name;
        $seller->username = $request->username;
        $seller->role_id = $this->role->id;
        $seller->email = $request->email;
        $seller->password = Hash::make($request->password);
        $seller->save();
        return response()->json($seller, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        return response()->json($seller, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        $seller->name = $request->name;
        $seller->username = $request->username;
        $seller->role_id = $this->role->id;
        $seller->email = $request->email;
        $seller->password = Hash::make($request->password);
        $seller->update();
        return response()->json($seller, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        $seller->delete();
        return response()->json($seller, 200);
    }
}
