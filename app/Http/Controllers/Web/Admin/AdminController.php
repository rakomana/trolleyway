<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\BlockStatus;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * @var $admin
    */
    private $admin;

    /**
     * @param Admin $admin
    */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
    
    /**
     * Block resource in storage
     * @return \Illuminate\Http\Response
    */
    public function userAcessStatus(Admin $admin)
    {
        if($admin->status === BlockStatus::Approved)
        {
            $admin->status = BlockStatus::Suspend;
            $admin->save();

            return redirect()->back();
        }

        $admin->status = BlockStatus::Approved;
        $admin->save();

        return redirect()->back();
    }
}
