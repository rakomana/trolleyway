<?php

namespace App\Http\Controllers\Web\Seller;

use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Seller\Shop\NotifySeller;
use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Requests\Seller\Shop\StoreSellerRequest;

class UserController extends Controller
{
    private $seller;
    private $db;

    /**
     * Inject models into the constructor
     * @param Seller $seller
     * @param DB $db
    */
    public function __construct(Seller $seller, DB $db)
    {
        $this->seller = $seller;
        $this->db = $db;
    }

    /**
     * Store new resource in storage
     * @return \Illuminate\Http\Response
    */
    public function store(StoreSellerRequest $request)
    {
        $this->db->beginTransaction();

        $generatedPassword = Str::random(8);
        $shop = $request->user('seller')->shop;

        $seller = new $this->seller();
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->password = Hash::make($generatedPassword);
        $seller->shop()->associate($shop);
        $seller->save();

        // Send welcome notification to seller
        $seller->notify(new NotifySeller(
            $shop,
            $generatedPassword
        ));
        
        // Log the activity
        activity()
            ->causedBy($request->user('seller'))
            ->performedOn($seller)
            ->log('Add seller to a shop');
        
        $this->db->commit();

        return response()->json([
            'message' => 'user registered succesfully'
        ]);
    }

    /**
     * Store new resource in storage
     * @return \Illuminate\Http\Response
    */
    public function destroy(Seller $seller, Request $request)
    {
        $seller->delete();

        // Log the activity
        activity()
            ->causedBy($request->user('seller'))
            ->performedOn($seller)
            ->log('Removed seller from a shop');

        return redirect()
            ->back()
            ->withInput()
            ->with('success','Seller deleted succesfully');
    }   
}