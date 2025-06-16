<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Database\ConnectionInterface as DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\BlockStatus;
use App\Models\Support;

class SupportController extends Controller
{
    /**
     * @var $support
     * @var $db
    */

    /**
     * @param Support $support
     * @param DB $db
    */
    public function __construct(Support $support, DB $db)
    {
        $this->support = $support;
        $this->db = $db;
    }

    /**
     * Block resource in storage
     * @return \Illuminate\Http\Response
    */
    public function userAcessStatus(Support $support)
    {
        if($support->status === BlockStatus::Approved)
        {
            $support->status = BlockStatus::Suspend;
            $support->save();

            return redirect()->back();
        }

        $support->status = BlockStatus::Approved;
        $support->save();

        return redirect()->back();
    }

    /**
     * store specific resource in storage
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->db->beginTransaction();

        $support = new $this->support();
        $support->name = $request->name;
        $support->email = $request->email;
        $support->password = Hash::make('password');
        $support->save();

        // Log the activity
        activity()
            ->causedBy($request->user('admin'))
            ->performedOn($support)
            ->log('created support user');

        $this->db->commit();

        return redirect()
                ->back()
                ->withInput()
                ->with('success','Support user created succesfully');
    }
}