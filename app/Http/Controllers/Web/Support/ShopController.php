<?php

namespace App\Http\Controllers\Web\Support;

use App\Models\Shop;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Enums\VerificationStatus as VS;
use Illuminate\Database\ConnectionInterface as DB;

class ShopController extends Controller
{
    private $db;
    private $role;
    private $shop;
    private $permission;

    /**
     * Inject models into the constructor
     * @param 
    */
    public function __construct(DB $db, Shop $shop, Role $role, Permission $permission)
    {
        $this->db = $db;
        $this->role = $role;
        $this->shop = $shop;
        $this->permission = $permission;
    }

    /**
     * Block resource in storage
     * @return \Illuminate\Http\Response
    */
    public function userAcessStatus(Shop $shop)
    {
        if($shop->status === VS::Nil)
        {
            $shop->status = VS::Pending;
            $shop->save();

            return redirect()->back();
        }

        if($shop->status === VS::Pending)
        {
            $shop->status = VS::Processing;
            $shop->save();

            return redirect()->back();
        }

        if($shop->status === VS::Processing)
        {
            $shop->status = VS::Approved;
            $shop->save();

            return redirect()->back();
        }

        if($shop->status === VS::Declined)
        {
            $shop->status = VS::Approved;
            $shop->save();

            return redirect()->back();
        }

        $shop->status = VS::Declined;
        $shop->save();

        return redirect()->back();
    }
}
