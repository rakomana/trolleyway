<?php

namespace App\Http\Controllers\Web\Support;

use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\BlockStatus;
use App\Models\Seller;
use App\Models\Support;

class SellerController extends Controller
{
    /**
     * @var $seller
     * @var $support
     * @var $db
    */
    private $seller;
    private $support;
    private $db;

    /**
     * @param Seller $seller
     * @param Support $support
     * @param DB $db
     */
    public function __construct(DB $db, Support $support, Seller $seller)
    {
        $this->db = $db;
        $this->support = $support;
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
        $support = $request->user('support');

        return view('admin.seller-edit', compact('seller', 'support'));
    }
}
