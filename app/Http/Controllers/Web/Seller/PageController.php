<?php

namespace App\Http\Controllers\Web\Seller;

use Spatie\Permission\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use App\Enums\GuardNames;
use App\Models\Category;
use App\Models\Product;
use App\Models\Support;
use App\Models\Seller;
use App\Models\User;

class PageController extends Controller
{
    /**
     * @var $support
     * @var $seller
     * @var $product
     * @var $permission
     * @var $role
     * @var $user
     * @var $category
     * @var $userProduct
    */
    private $seller;
    private $support;
    private $category;
    private $product;
    private $permission;
    private $role;
    private $user;
    private $userProduct;

    /**
     * Inject models into the constructor
     * 
     * @param Role $role
     * @param Support $support
     * @param Seller $seller
     * @param Product $product
     * @param Permission $permission
    */
    public function __construct(Support $support, Seller $seller, Category $category, Product $product, Permission $permission, Role $role, User $user, UserProduct $userProduct)
    {
        $this->role = $role;
        $this->support = $support;
        $this->seller = $seller;
        $this->product = $product;
        $this->category = $category;
        $this->permission = $permission;
        $this->user = $user;
        $this->userProduct = $userProduct;
    }
    /**
     * Renders all Seller(s) pages
     * 
    */
    public function blankPage(Request $request)
    {
        $seller = $request->user('seller')->shop;
        
        return view('seller.blank-page', compact('seller'));
    }

    public function calendar(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.calendar', compact('seller'));
    }
    
    public function chat(Request $request)
    {
        $seller = $request->user('seller')->shop;

        $supports = $this->support->all();

        return view('seller.chat', compact('seller', 'supports'));
    }

    public function components(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.components', compact('seller'));
    }

    public function compose(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.compose', compact('seller'));
    }

    public function customers(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.customers', compact('seller'));
    }

    public function dataTables(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.data-tables', compact('seller'));
    }

    public function error404(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.error-404', compact('seller'));
    }

    public function error500(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.error-500', compact('seller'));
    }

    public function forgotPassword(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.forgot-password', compact('seller'));
    }

    public function formBasicInputs(Request $request)
    {
        $seller = $request->user('seller')->shop;
        $category = $this->category->all();
        
        return view('seller.form-basic-inputs', compact('seller', 'category'));
    }

    public function formHorizontal(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.form-horizontal', compact('seller'));
    }

    public function formInputGroups(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.form-input-groups', compact('seller'));
    }

    public function formMask(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.form-mask', compact('seller'));
    }

    public function shop(Request $request)
    {
        $seller = $request->user('seller')->shop;
        
        return view('seller.shop', compact('seller'));
    }

    public function formVertical(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.form-vertical', compact('seller'));
    }

    public function inbox(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.inbox', compact('seller'));
    }

    public function invoice(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.invoice', compact('seller'));
    }

    public function lockScreen(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.lock-screen', compact('seller'));
    }

    public function mapsVector(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.maps-vector', compact('seller'));
    }

    public function Orders(Request $request)
    {
        $seller = $request->user('seller')->shop;

        $collect = $this->userProduct->all();

        $products = $seller->product;

        foreach($collect as $order){
            foreach($products as $product){
                if($order->product_id == $product->id){
                    $orders[] = $order;
                }
            }
        }

        return view('seller.orders', compact('seller', 'orders', 'product'));
    }

    public function productDetails(Request $request, $id)
    {
        $seller = $request->user('seller')->shop;

        $product = $this->product->whereId($id)->first();

        return view('seller.product-details', compact('seller', 'product'));
    }

    public function products(Request $request)
    {
        $seller = $request->user('seller')->shop;

        $products = $seller->product;

        return view('seller.products', compact('seller', 'products'));
    }

    public function profile(Request $request)
    {
        $seller = $request->user('seller');

        $shop = $seller->shop;

        $logs = $seller->logs;

        return view('seller.profile', compact('seller', 'shop', 'logs'));
    }

    public function editRole(Role $role, Request $request)
    {
        $seller = $request->user('seller');

        $shop = $seller->shop;

        return view('seller.role-edit', compact('seller', 'shop', 'role'));
    }

    public function editUser(Seller $seller)
    {
        $shop = $seller->shop;

        $roles = $this->role->whereName(GuardNames::Seller)->get();

        return view('seller.user-edit', compact('seller', 'shop', 'roles'));
    }

    public function tablesBasic(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.tables-basic');
    }

    public function users(Request $request)
    {
        $seller = $request->user('seller')->shop;

        $sellers = $seller->seller;

        return view('seller.users', compact('seller', 'sellers'));
    }

    public function roles(Request $request)
    {
        $seller = $request->user('seller')->shop;

        $permissions = $this->permission->where('guard_name', GuardNames::Seller)->get();

        $roles = $this->role->where('guard_name', GuardNames::Seller)->get();
        
        return view('seller.roles', compact('seller', 'permissions', 'roles'));
    }

    public function productSuccess(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.success-product', compact('seller'));
    }

    public function productFail(Request $request)
    {
        $seller = $request->user('seller')->shop;

        return view('seller.fail-product', compact('seller'));
    }
}
