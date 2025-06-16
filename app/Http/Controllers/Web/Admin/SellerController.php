<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\BlockStatus;
use App\Models\Seller;
use App\Models\Admin;

class SellerController extends Controller
{
    /**
     * @var $seller
     * @var $admin
     * @var $db
    */
    private $seller;
    private $admin;
    private $db;

    /**
     * @param Seller $seller
     * @param Admin $admin
     * @param DB $db
     */
    public function __construct(DB $db, Admin $admin, Seller $seller)
    {
        $this->db = $db;
        $this->admin = $admin;
        $this->seller = $seller;        
    }

    /**
     * Block resource in storage
     * @return \Illuminate\Http\Response
    */
    public function userAcessStatus(Seller $seller)
    {
        if($seller->status === BlockStatus::Approved)
        {
            $seller->status = BlockStatus::Suspend;
            $seller->save();

            return redirect()->back();
        }

        $seller->status = BlockStatus::Approved;
        $seller->save();

        return redirect()->back();
    }

        /**
     * Block resource in storage
     * @return \Illuminate\Http\Response
    */
    public function show(Seller $seller, Request $request)
    {
        $admin = $request->user('admin');

        return view('admin.seller-edit', compact('seller', 'admin'));
    }
}
