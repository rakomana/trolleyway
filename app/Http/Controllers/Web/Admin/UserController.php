<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Admin\Shop\NotifyAdmin;
use Illuminate\Database\ConnectionInterface as DB;
use App\Notifications\Seller\Shop\NotifySeller;

class UserController extends Controller
{
    private $admin;
    private $db;

    /**
     * Inject models into the constructor
     * @param Admin $admin
     * @param DB $db
    */
    public function __construct(Admin $admin, DB $db)
    {
        $this->admin = $admin;
        $this->db = $db;
    }

    /**
     * Store new resource in storage
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->db->beginTransaction();

        $admin = new $this->admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make('password');
        $admin->save();

        // Log the activity
        activity()
            ->causedBy($request->user('admin'))
            ->performedOn($admin)
            ->log('created admin.');
        
        $this->db->commit();

        return redirect()
            ->back()
            ->withInput()
            ->with('success','Admin created succesfully');
    }
}