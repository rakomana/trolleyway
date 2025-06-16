<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\BlockStatus;
use App\Models\User;
use App\Models\Admin;


class CustomerController extends Controller
{
    /**
     * @var $user
     * @var $admin
     * @var $db
    */
    private $user;
    private $admin;
    private $db;

    /**
     * @param User $user
     * @param Admin $admin
     * @param DB $db
    */
    public function __construct(User $user, Admin $admin, DB $db)
    {
        $this->user = $user;
        $this->admin = $admin;
        $this->db = $db;
    }

    /**
     * Block resource in storage
     * @return \Illuminate\Http\Response
    */
    public function userAcessStatus(Request $request, User $user)
    {
        if($user->status === BlockStatus::Approved)
        {
            $user->status = BlockStatus::Suspend;
            $user->save();

            return redirect()->back();
        }

        $user->status = BlockStatus::Approved;
        $user->save();

        return redirect()->back();
    }
}
