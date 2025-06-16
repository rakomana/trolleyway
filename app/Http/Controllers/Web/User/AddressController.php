<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\ConnectionInterface as DB;

class AddressController extends Controller
{
     /**
      * @var $address
      * @var $db
    */
    private $address;
    private $db;

    /**
     * Inject models into constructor
     * @param Address $address
     * @param DB $db
    */
    public function __construct(Address $address, DB $db)
    {
        $this->address = $address;
        $this->db = $db;
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->db->beginTransaction();

        $user = $request->user();

        $address = new $this->address();
        $address->email = $request->email;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->phone_number = $request->phone_number;
        $address->type = $request->type;
        $address->address = $request->address;
        $address->unit = $request->unit;
        $address->store =  $request->store;
        $address->save();

        $user->address()->associate($address);
        $user->save();

        $this->db->commit();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Address $address)
    {
        $this->db->beginTransaction();

        $user = $request->user(); 
        $user->address()->dissociate();
        $user->save();

        $address->delete();

        $this->db->commit();

        return redirect()->back();
    }
}
