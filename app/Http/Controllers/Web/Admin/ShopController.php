<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Shop;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Enums\Role as EnumRole;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Enums\VerificationStatus as VS;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Seller\Product\ProductStoreRequest;
use Illuminate\Database\ConnectionInterface as DB;

class ShopController extends Controller
{
    private $db;
    private $role;
    private $shop;
    private $admin;
    private $product;
    private $permission;

    /**
     * Inject models into the constructor
     * @param DB 4db
     * @param Shop  $db
    */
    public function __construct(DB $db, Shop $shop, Role $role, Permission $permission, Admin $admin, Product $product)
    {
        $this->db = $db;
        $this->role = $role;
        $this->shop = $shop;
        $this->admin = $admin;
        $this->product = $product;
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

        /**
     * Create product
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $this->db->beginTransaction();

        $shop = $this->shop->whereId($request->market)->first();

        $product = new $this->product();
        $product->url = $request->url;
        $product->name = $request->name;
        $product->title = $request->title;
        $product->status = $request->status;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->new_price = $request->new_price;
        $product->old_price = $request->old_price;
        $product->meta_title = $request->meta_title;
        $product->description = $request->description;
        $product->youtube_link = $request->youtube_link;
        $product->meta_description = $request->meta_description;

        $items = $request->file('image');

        $dir = $shop->shop_name;

        Storage::cloud()->makeDirectory($dir);

        foreach($items as $item)
        {
            $name = $item->getClientOriginalName();
            Storage::cloud()->put('p/'.$dir.'/'.$name, fopen($item, 'r+'), 'public');
            $image[] = 'p/'.$shop->shop_name.'/'.$name;
        }

        $product->image = json_encode($image);
        $product->shop()->associate($shop);

        $product->save();

        $this->db->commit();

        return response()->json([
            'message' => 'saved succesfully'
        ]);
    }
}
