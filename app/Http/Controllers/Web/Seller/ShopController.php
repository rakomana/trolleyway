<?php

namespace App\Http\Controllers\Web\Seller;

use App\Models\Shop;
use App\Models\Seller;
use App\Enums\GuardNames;
use Illuminate\Http\Request;
use App\Enums\Role as EnumRole;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Enums\VerificationStatus as VS;
use App\Http\Requests\Seller\StoreShopRequest;
use Illuminate\Database\ConnectionInterface as DB;

class ShopController extends Controller
{
    private $db;
    private $role;
    private $shop;
    private $seller;
    private $permission;

    /**
     * Inject models into the constructor
     * @param 
    */
    public function __construct(DB $db, Shop $shop, Role $role, Permission $permission, Seller $seller)
    {
        $this->db = $db;
        $this->role = $role;
        $this->shop = $shop;
        $this->seller = $seller;
        $this->permission = $permission;
    }

    /**
     * Store new resource in storage
     * @return \Illuminate\Http\Response
    */
    public function store(StoreShopRequest $request)
    {
        $seller = $request->user('seller');

        if($seller->shop)
        {
            return redirect()
                ->back()
                ->withInput()
                ->with('error','These user has a shop already');
        }

        $this->db->beginTransaction();

        $shop = new $this->shop();
        $shop->status = VS::Nil;
        $shop->shop_name = $request->shop_name;
        $shop->shop_email = $request->shop_email;
        $shop->company_reg = $request->company_reg;
        $shop->shop_category = $request->shop_category;
        $shop->shop_description = $request->shop_description;
        $shop->shop_phone_number = $request->shop_phone_number;

        //Upload document to storage
        $document = $request->file('shop_document');
        $doc_name = $document->getClientOriginalName();
        $document->move('uploads/shop/documents/',$doc_name);
        $shop->shop_document = $doc_name;

        //Upload logo to storage
        $logo = $request->file('shop_logo');
        $logo_name = $logo->getClientOriginalName();
        $logo->move('uploads/shop/logos/',$logo_name);
        $shop->shop_logo = $logo_name;

        $shop->save();

        
        $seller->shop()->associate($shop);
        $seller->save();

        //Create primary admin of the shop
        $role = $this->role->firstOrNew(['name' => EnumRole::PrimaryAdmin, 'guard_name' => GuardNames::Seller]);
        $role->save();

        // Attach all [seller] permissions to the role
        $permissions = $this->permission->where('guard_name', GuardNames::Seller)->get();
        $role->syncPermissions($permissions);

        // Attach the user to the role
        $seller->assignRole($role);

        $this->db->commit();

        return redirect('/seller');
    }
}
