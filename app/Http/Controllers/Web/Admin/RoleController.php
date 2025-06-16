<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Enums\Role as EnumRole;
use Illuminate\Http\Request;
use App\Enums\GuardNames;

class RoleController extends Controller
{
    /**
     *  @var $role
     *  @var $db 
    */
    private $role;
    private $db;

    /**
     * Inject models into the constructor
     * @param Role $role
     * @param DB $db
    */
    public function __construct(Role $role, DB $db)
    {
        $this->role = $role;
        $this->db = $db;
    }

    /**
     * Store new resource in storage
     * @return \Illuminate\Http\Response
    */
    public function store(StoreRoleRequest $request)
    {
        $this->db->beginTransaction();

        $role = new $this->role();
        $role->name = $request->name;
        $role->guard_name = GuardNames::Admin;
        $role->save();

        $this->db->commit();

        return response()->json(['message' => 'Role created succesfully']);

    }
}
