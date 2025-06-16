<?php

namespace App\Http\Controllers\Web\Support;

use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\UserProduct;
use App\Enums\GuardNames;
use App\Models\Support;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Admin;
use App\Models\Shop;
use App\Models\User;

class PageController extends Controller
{
    /**
     * @var $admin
     * @var $product
     * @var $permission
     * @var $role
     * @var $user
     * @var $seller
     * @var $support
     * @var $shop
    */
    private $admin;
    private $product;
    private $permission;
    private $role;
    private $user;
    private $shop;
    private $seller;
    private $support;

    /**
     * Inject models into the constructor
     * 
     * @param Support $support
     * @param Seller $seller
     * @param Role $role
     * @param User $user
     * @param Shop $shop
     * @param Admin $admin
     * @param Product $product
     * @param Permission $permission
    */
    public function __construct(Shop $shop, Support $support, Seller $seller, User $user, Admin $admin, Product $product, Permission $permission, Role $role)
    {
        $this->shop = $shop;
        $this->user = $user;
        $this->role = $role;
        $this->admin = $admin;
        $this->seller = $seller;
        $this->product = $product;
        $this->support = $support;
        $this->permission = $permission;
    }
    /**
     * Renders all admin(s) pages
     * 
    */
    public function blankPage(Request $request)
    {
        return view('support.blank-page');
    }

    public function calendar(Request $request)
    {
        return view('support.calendar');
    }
    
    public function chat(Request $request)
    {
        $sellers = $this->seller->all();

        return view('support.chat', compact('sellers'));
    }

    public function components(Request $request)
    {
        return view('support.components');
    }

    public function compose(Request $request)
    {
        return view('support.compose');
    }

    public function customers(Request $request)
    {
        $users = $this->user->all();

        return view('support.customers', compact('users'));
    }

    public function dataTables(Request $request)
    {
        return view('support.data-tables');
    }

    public function error404(Request $request)
    {
        return view('support.error-404');
    }

    public function error500(Request $request)
    {
        return view('support.error-500');
    }

    public function forgotPassword(Request $request)
    {
        return view('support.forgot-password');
    }

    public function formBasicInputs(Request $request)
    {
        return view('support.form-basic-inputs');
    }

    public function formHorizontal(Request $request)
    {
        return view('support.form-horizontal');
    }

    public function formInputGroups(Request $request)
    {
        return view('support.form-input-groups');
    }

    public function formMask(Request $request)
    {
        return view('support.form-mask');
    }

    public function shop(Request $request)
    {
        return view('support.shop');
    }

    public function formVertical(Request $request)
    {
        return view('support.form-vertical');
    }

    public function inbox(Request $request)
    {
        return view('support.inbox');
    }

    public function invoice(Request $request)
    {
        return view('support.invoice');
    }

    public function lockScreen(Request $request)
    {
        return view('support.lock-screen');
    }

    public function mapsVector(Request $request)
    {
        return view('support.maps-vector');
    }

    public function Orders(Request $request)
    {
        $shop = $this->shop->all();

        $orders = UserProduct::all();

        return view('support.orders', compact('shop', 'orders'));
    }

    public function productDetails(Product $product)
    {
        return view('support.product-details', compact('product'));
    }

    public function products(Request $request)
    {
        $products = $this->product->all();
    
        return view('support.products', compact('products'));
    }

    public function profile(Request $request)
    {
        $support = $request->user('support');
        $logs = $support->logs;

        return view('support.profile', compact('support', 'logs'));
    }

    public function editRole(Role $role, Request $request)
    {
        return view('support.role-edit', compact('role'));
    }

    public function editUser(Admin $admin)
    {
        $roles = $this->role->whereName(GuardNames::Admin)->get();

        return view('support.user-edit', compact('admin', 'roles'));
    }

    public function editSeller(Seller $seller)
    {
        return view('support.seller-edit', compact('seller'));
    }

    public function editCustomer(User $user)
    {
        return view('support.customer-edit', compact('user'));
    }

    public function editAdmin(Admin $admin)
    {
        return view('support.admins-edit', compact('admin'));
    }

    public function editSupport(Support $support)
    {
        return view('support.support-edit', compact('support'));
    }

    public function editShop(Shop $shop)
    {
        return view('support.shops-edit', compact('shop'));
    }

    public function tablesBasic(Request $request)
    {
        return view('support.tables-basic');
    }

    public function users(Request $request)
    {
        $admins = $this->admin->all();

        return view('support.users', compact('admins'));
    }

    public function productSuccess(Request $request)
    {
        return view('support.success-product');
    }

    public function productFail(Request $request)
    {
        return view('support.fail-product');
    }

    public function sellers(Request $request)
    {
        $sellers = $this->seller->all();

        return view('support.sellers', compact('sellers'));
    }

    public function admins(Request $request)
    {
        $admins = $this->admin->all();

        return view('support.admins', compact('admins'));
    }

    public function supports(Request $request)
    {
        $supports = $this->support->all();

        return view('support.supports', compact('supports'));
    }

    public function shops(Request $request)
    {
        $markets = $this->shop->all();

        return view('support.shops', compact('markets'));
    }
}
