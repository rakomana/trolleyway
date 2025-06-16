<?php

namespace App\Http\Controllers\Web\Seller\Auth;

use Auth;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Requests\Seller\Auth\RegisterSellerRequest;

class RegisterController extends Controller
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
     * Login the seller.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterSellerRequest $request)
    {
        $this->db->beginTransaction();

        $seller = new $this->seller();
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->password = Hash::make($request->password);
        $seller->save();

        $this->db->commit();

        return redirect('seller/login');
    }
}