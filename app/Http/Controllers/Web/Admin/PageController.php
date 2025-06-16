<?php

namespace App\Http\Controllers\Web\Admin;

use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Enums\GuardNames;
use App\Models\Support;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Admin;
use App\Models\Shop;
use App\Models\User;
use App\Models\Log;
use App\Models\Order;
use DB;

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
     * @var $log
     * @var $order
    */
    private $admin;
    private $product;
    private $permission;
    private $role;
    private $user;
    private $shop;
    private $seller;
    private $support;
    private $log;
    private $order;

    /**
     * Inject models into the constructor
     *
     * @param Order $order
     * @param Log $log
     * @param Support $support
     * @param Seller $seller
     * @param Role $role
     * @param User $user
     * @param Shop $shop
     * @param Admin $admin
     * @param Product $product
     * @param Permission $permission
    */
    public function __construct(Order $order, Log $log, Shop $shop, Support $support, Seller $seller, User $user, Admin $admin, Product $product, Permission $permission, Role $role)
    {
        $this->order = $order;
        $this->log = $log;
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
        return view('admin.blank-page');
    }

    public function calendar(Request $request)
    {
        return view('admin.calendar');
    }

    public function chat(Request $request)
    {
        return view('admin.chat');
    }

    public function components(Request $request)
    {
        return view('admin.components');
    }

    public function compose(Request $request)
    {
        return view('admin.compose');
    }


    public function customers(Request $request)
    {
        $users = $this->user->all();

        return view('admin.customers', compact('users'));
    }

    public function dataTables(Request $request)
    {
        return view('admin.data-tables');
    }

    public function error404(Request $request)
    {
        return view('admin.error-404');
    }

    public function error500(Request $request)
    {
        return view('admin.error-500');
    }

    public function forgotPassword(Request $request)
    {
        return view('admin.forgot-password');
    }

    public function formBasicInputs(Request $request)
    {
        $shops = $this->shop->all();

        return view('admin.form-basic-inputs', compact('shops'));
    }

    public function formHorizontal(Request $request)
    {
        return view('admin.form-horizontal');
    }

    public function formInputGroups(Request $request)
    {
        return view('admin.form-input-groups');
    }

    public function formMask(Request $request)
    {
        return view('admin.form-mask');
    }

    public function shop(Request $request)
    {
        return view('admin.shop');
    }

    public function formVertical(Request $request)
    {
        return view('admin.form-vertical');
    }

    public function inbox(Request $request)
    {
        return view('admin.inbox');
    }

    public function trash(Request $request)
    {
        return view('admin.trash');
    }

    public function draft(Request $request)
    {
        return view('admin.draft');
    }

    public function sent(Request $request)
    {
        return view('admin.sent');
    }

    public function invoice(Request $request)
    {
        return view('admin.invoice');
    }

    public function lockScreen(Request $request)
    {
        return view('admin.lock-screen');
    }

    public function mapsVector(Request $request)
    {
        return view('admin.maps-vector');
    }

    public function Orders(Request $request)
    {
        $orders = $this->order->all();

        return view('admin.orders', compact('orders'));
    }

    public function productDetails(Product $product)
    {
        $reviews = $product->reviews;

        return view('admin.product-details', compact('product', 'reviews'));
    }

    public function products(Request $request)
    {
        $products = $this->product->all();

        return view('admin.products', compact('products'));
    }

    public function profile(Request $request)
    {
        $admin = $request->user('admin');
        $logs = $admin->logs;

        return view('admin.profile', compact('admin', 'logs'));
    }

    public function editRole(Role $role, Request $request)
    {
        $admin = $request->user('admin');

        return view('admin.role-edit', compact('admin', 'role'));
    }

    public function editUser(Admin $admin)
    {
        $roles = $this->role->whereName(GuardNames::Admin)->get();

        return view('admin.user-edit', compact('admin', 'roles'));
    }

    public function editSeller(Seller $seller)
    {
        return view('admin.seller-edit', compact('seller'));
    }

    public function editCustomer(User $user)
    {
        return view('admin.customer-edit', compact('user'));
    }

    public function editAdmin(Admin $admin)
    {
        return view('admin.admins-edit', compact('admin'));
    }

    public function editSupport(Support $support)
    {
        return view('admin.support-edit', compact('support'));
    }

    public function editShop(Shop $shop)
    {
        return view('admin.shops-edit', compact('shop'));
    }

    public function tablesBasic(Request $request)
    {
        return view('admin.tables-basic');
    }

    public function users(Request $request)
    {
        $admin = $request->user('admin');

        $admins = $this->admin->all();

        return view('admin.users', compact('admin', 'admins'));
    }

    public function roles(Request $request)
    {
        $permissions = $this->permission->where('guard_name', GuardNames::Admin)->get();

        $roles = $this->role->where('guard_name', GuardNames::Admin)->get();

        return view('admin.roles', compact('permissions', 'roles'));
    }

    public function productSuccess(Request $request)
    {
        return view('admin.success-product');
    }

    public function productFail(Request $request)
    {
        return view('admin.fail-product');
    }

    public function sellers(Request $request)
    {
        $sellers = $this->seller->all();

        return view('admin.sellers', compact('sellers'));
    }

    public function admins(Request $request)
    {
        $admins = $this->admin->all();

        return view('admin.admins', compact('admins'));
    }

    public function supports(Request $request)
    {
        $supports = $this->support->all();

        return view('admin.supports', compact('supports'));
    }

    public function shops(Request $request)
    {
        $markets = $this->shop->all();

        return view('admin.shops', compact('markets'));
    }

    public function audit()
    {
        $activities = Activity::all();

        return view('admin.audit', compact('activities'));
    }

    public function delete(Product $product)
    {
        $product->delete();

        return back()->with('success', 'product deleted succesfully');
    }

    public function editProduct(Product $product)
    {
        $shops = $this->shop->all();

        return view('admin.edit-product', compact('product', 'shops'));
    }
}
