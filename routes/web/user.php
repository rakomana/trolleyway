<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Generic\ChatController;
use App\Http\Controllers\Generic\BlogController;
use App\Http\Controllers\Generic\CouponController;
use App\Http\Controllers\Web\User\CartController;
use App\Http\Controllers\Web\User\HomeController;
use App\Http\Controllers\Web\Admin\OrderController;
use App\Http\Controllers\Web\User\AddressController;
use App\Http\Controllers\Web\User\ReviewController;
use App\Http\Controllers\Web\Admin\AdminController;
use App\Http\Controllers\Web\Seller\UserController;
use App\Http\Controllers\Web\Seller\ShopController;
use App\Http\Controllers\Web\User\SearchController;
use App\Http\Controllers\Web\User\PaymentController;
use App\Http\Controllers\Web\Seller\PageController;
use App\Http\Controllers\Web\Seller\RoleController;
use App\Http\Controllers\Generic\CampaignController;
use App\Http\Controllers\Web\User\ProductController;
use App\Http\Controllers\Web\User\ContactController;
use App\Http\Controllers\Web\Admin\SupportController;
use App\Http\Controllers\Web\Admin\CustomerController;
use App\Http\Controllers\Web\Seller\AccountController;
use App\Http\Controllers\Web\User\Auth\LoginController;
use App\Http\Controllers\Web\User\SubscriptionController;
use App\Http\Controllers\Web\User\Auth\MobileLoginController;
use App\Http\Controllers\Web\Seller\Auth\ResetPasswordController;
use App\Http\Controllers\Web\Seller\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\User\PageController as UserPageController;
use App\Http\Controllers\Web\Admin\PageController as AdminPageController;
use App\Http\Controllers\Web\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Web\Admin\UserController as AdminUserController;
use App\Http\Controllers\Web\Admin\ShopController as AdminShopController;
use App\Http\Controllers\Web\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Web\Seller\HomeController as SellerHomeController;
use App\Http\Controllers\Generic\OrderController as GenericOrderController;
use App\Http\Controllers\Web\Admin\SellerController as AdminSellerController;
use App\Http\Controllers\Web\Support\PageController as SupportPageController;
use App\Http\Controllers\Web\Support\ShopController as SupportShopController;
use App\Http\Controllers\Web\Support\HomeController as SupportHomeController;
use App\Http\Controllers\Web\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Web\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Web\Support\SellerController as SupportSellerController;
use App\Http\Controllers\Web\Seller\Auth\LoginController as SellerLoginController;
use App\Http\Controllers\Web\Support\AccountController as SupportAccountController;
use App\Http\Controllers\Web\Support\Auth\LoginController as SupportLoginController;
use App\Http\Controllers\Web\Seller\Auth\RegisterController as SellerRegisterController;
use App\Http\Controllers\Web\Admin\Auth\VerificationController as AdminVerificationController;
use App\Http\Controllers\Web\Seller\Auth\VerificationController as SellerVerificationController;
use App\Http\Controllers\Web\Admin\Auth\ResetPasswordController as AdminResetPasswordController;
use App\Http\Controllers\Web\Support\Auth\VerificationController as SupportVerificationController;
use App\Http\Controllers\Web\Admin\Auth\ForgotPasswordController as AdminForgotPasswordController;
use App\Http\Controllers\Web\Admin\Auth\ConfirmPasswordController as AdminConfirmPasswordController;
use App\Http\Controllers\Web\Support\Auth\ResetPasswordController as SupportResetPasswordController;
use App\Http\Controllers\Web\Seller\Auth\ConfirmPasswordController as SellerConfirmPasswordController;
use App\Http\Controllers\Web\Support\Auth\ForgotPasswordController as SupportForgotPasswordController;
use App\Http\Controllers\Web\Support\Auth\ConfirmPasswordController as SupportConfirmPasswordController;
use App\Events\NewMessage;
#Throttle All Auth

/**start seller routes */
Route::group(['prefix' => 'seller'], function () {
    Route::get('/forgot/password', [SellerHomeController::class, 'indexForgot']);
    Route::get('/reset/password', [SellerHomeController::class, 'indexReset']);
    Route::post('/login', [SellerLoginController::class, 'login'])
        ->middleware('throttle:3,1');;
    Route::post('/logout', [SellerLoginController::class, 'logout']);
    Route::post('/register/user', [UserController::class, 'store']);

    Route::post('/register', [SellerRegisterController::class, 'register'])
        ->middleware('throttle:3,1');
    Route::get('/register', [SellerHomeController::class, 'indexRegister']);
    Route::get('/login', [SellerHomeController::class, 'indexLogin'])->name('seller');

    Route::prefix('password')->group(function () {
        Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
        Route::post('reset', [ResetPasswordController::class, 'reset']);
    });
});

Route::group(['middleware' => 'auth:seller'], function () {
    Route::get('seller/shop', [PageController::class, 'shop']);
    Route::post('wallet', [SellerHomeController::class, 'withdraw']);
    Route::post('seller/register/shop', [ShopController::class, 'store'])
        ->middleware('throttle:3,1');
});

Route::group(['middleware' => ['auth:seller', 'shop'], 'prefix' => 'seller'], function () {
    Route::post('/role', [RoleController::class, 'store'])->middleware('can:create roles');
    Route::get('/', [SellerHomeController::class, 'index']);

    Route::post('/account/change-password', [AccountController::class, 'updatePassword']);
    Route::post('/account', [AccountController::class, 'update']);

    Route::get('/blank-page', [PageController::class, 'blankPage']);
    Route::get('/calendar', [PageController::class, 'calendar']);
    Route::get('/chat', [PageController::class, 'chat']);
    Route::get('/components', [PageController::class, 'components']);
    Route::get('/compose', [PageController::class, 'compose']);
    Route::get('/customers', [PageController::class, 'customers']);
    Route::get('/data-tables', [PageController::class, 'dataTables']);
    Route::get('/error-404', [PageController::class, 'error404']);
    Route::get('/error500', [PageController::class, 'error500']);

    Route::get('/forgot-password', [PageController::class, 'forgotPassword']);
    Route::get('/form-basic-inputs', [PageController::class, 'formBasicInputs']);
    Route::get('/form-horizontal', [PageController::class, 'formHorizontal']);
    Route::get('/form-input-groups', [PageController::class, 'formInputGroups']);
    Route::get('/form-mask', [PageController::class, 'formMask']);
    Route::get('/form-vertical', [PageController::class, 'formVertical']);
    Route::get('/inbox', [PageController::class, 'inbox']);
    Route::get('/invoice', [PageController::class, 'invoice']);
    Route::get('/lock-screen', [PageController::class, 'lockScreen']);
    Route::get('/maps-vector', [PageController::class, 'mapsVector']);
    Route::get('/blank-page', [PageController::class, 'blankPage']);
    Route::get('/orders', [PageController::class, 'orders']);
    Route::get('/product-details/{id}', [PageController::class, 'productDetails']);
    Route::get('/products', [PageController::class, 'products']);
    Route::get('/profile', [PageController::class, 'profile']);
    Route::get('/edit-user/{seller}', [PageController::class, 'editUser'])->middleware('can:edit user');
    Route::get('/edit-role/{seller}', [PageController::class, 'editRole']);
    Route::get('/tables-basic', [PageController::class, 'tablesBasic']);
    Route::get('/users', [PageController::class, 'users'])->middleware('can:view users');
    Route::get('/user/{seller}', [UserController::class, 'destroy'])->middleware('can:delete users');
    Route::get('/roles', [PageController::class, 'roles']);
    Route::get('/product-fail', [PageController::class, 'productFail']);
    Route::get('/product-success', [PageController::class, 'productSuccess']);

    Route::group(['prefix' => 'shop'], function () {
        Route::post('/product', [ProductController::class, 'store'])->middleware('can:create resources');
    });
});
/** end seller routes */

/** start admin routes */
Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [AdminLoginController::class, 'login'])
        ->middleware('throttle:3,1');
    Route::post('/logout', [AdminLoginController::class, 'logout']);
    Route::post('/register/user', [AdminUserController::class, 'store'])
        ->middleware('throttle:3,1');
    Route::get('/reset/password', [AdminHomeController::class, 'indexReset']);
    Route::get('/forgot/password', [AdminHomeController::class, 'indexForgot']);
    Route::get('/login', [AdminHomeController::class, 'indexLogin'])->name('admin');

    Route::prefix('password')->group(function () {
        Route::post('email', [AdminForgotPasswordController::class, 'sendResetLinkEmail']);
        Route::post('reset', [AdminResetPasswordController::class, 'reset']);
    });
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {
    Route::post('/role', [AdminRoleController::class, 'store']);

    Route::get('/', [AdminHomeController::class, 'index']);

    Route::post('/account/change-password', [AdminAccountController::class, 'updatePassword']);
    Route::post('/account', [AdminAccountController::class, 'update']);


    Route::get('product/delete/{product}', [AdminPageController::class, 'delete']);
    Route::get('/data-tables', [AdminPageController::class, 'dataTables']);
    Route::get('/components', [AdminPageController::class, 'components']);
    Route::get('/blank-page', [AdminPageController::class, 'blankPage']);
    Route::get('/customers', [AdminPageController::class, 'customers']);
    Route::get('/error-404', [AdminPageController::class, 'error404']);
    Route::get('/error500', [AdminPageController::class, 'error500']);
    Route::get('/calendar', [AdminPageController::class, 'calendar']);
    Route::get('/chat', [AdminPageController::class, 'chat']);

    Route::get('/product-details/{product}', [AdminPageController::class, 'productDetails']);
    Route::get('/product/edit/{product}', [AdminPageController::class, 'editProduct']);
    Route::get('/form-input-groups', [AdminPageController::class, 'formInputGroups']);
    Route::get('/form-basic-inputs', [AdminPageController::class, 'formBasicInputs']);
    Route::get('/form-horizontal', [AdminPageController::class, 'formHorizontal']);
    Route::get('/product-success', [AdminPageController::class, 'productSuccess']);
    Route::get('/forgot-password', [AdminPageController::class, 'forgotPassword']);
    Route::post('/product/edit/{product}', [ProductController::class, 'update']);
    Route::get('/edit-user/{seller}', [AdminPageController::class, 'editUser']);

    Route::get('/edit-seller/{seller}', [AdminPageController::class, 'editSeller']);
    Route::get('/edit-role/{seller}', [AdminPageController::class, 'editRole']);
    Route::get('/form-vertical', [AdminPageController::class, 'formVertical']);
    Route::get('/product-fail', [AdminPageController::class, 'productFail']);
    Route::get('/tables-basic', [AdminPageController::class, 'tablesBasic']);
    Route::get('/lock-screen', [AdminPageController::class, 'lockScreen']);
    Route::get('/maps-vector', [AdminPageController::class, 'mapsVector']);
    Route::get('/user/{seller}', [AdminUserController::class, 'destroy']);
    Route::get('/blank-page', [AdminPageController::class, 'blankPage']);
    Route::get('/form-mask', [AdminPageController::class, 'formMask']);
    Route::get('/products', [AdminPageController::class, 'products']);
    Route::get('/invoice', [AdminPageController::class, 'invoice']);
    Route::get('/profile', [AdminPageController::class, 'profile']);
    Route::get('/orders', [AdminPageController::class, 'orders']);
    Route::get('/users', [AdminPageController::class, 'users']);
    Route::get('/roles', [AdminPageController::class, 'roles']);

    Route::get('/inbox', [AdminPageController::class, 'inbox']);
    Route::get('/compose', [AdminPageController::class, 'compose']);
    Route::get('/sent', [AdminPageController::class, 'sent']);
    Route::get('/draft', [AdminPageController::class, 'draft']);
    Route::get('/compose', [AdminPageController::class, 'compose']);
    Route::get('/trash', [AdminPageController::class, 'trash']);

    Route::get('edit-shop/{shop}', [AdminPageController::class, 'editShop'])->middleware('can:verify shops');
    Route::get('block/shop/{shop}', [AdminShopController::class, 'userAcessStatus'])->middleware('can:verify shops');

    Route::get('/edit-admin/{admin}', [AdminPageController::class, 'editAdmin'])->middleware('can:edit admins');
    Route::get('block/admin/{admin}', [AdminController::class, 'userAcessStatus']);

    Route::get('block/seller/{seller}', [AdminSellerController::class, 'userAcessStatus'])->middleware('can:edit user');
    Route::get('seller/{seller}', [AdminSellerController::class, 'show'])->middleware('can:edit user');;

    Route::get('edit-customer/{user}', [AdminPageController::class, 'editCustomer'])->middleware('can:edit user');;
    Route::get('block/customer/{user}', [CustomerController::class, 'userAcessStatus'])->middleware('can:edit user');;

    Route::get('edit-support/{support}', [AdminPageController::class, 'editSupport'])->middleware('can:edit user');;
    Route::get('block/support/{support}', [SupportController::class, 'userAcessStatus'])->middleware('can:edit user');;
    Route::post('support', [SupportController::class, 'store']);

    Route::get('supports', [AdminPageController::class, 'supports']);
    Route::get('sellers', [AdminPageController::class, 'sellers']);
    Route::get('admins', [AdminPageController::class, 'admins'])->middleware('can:view admins');
    Route::get('markets', [AdminPageController::class, 'shops']);
    Route::get('audit', [AdminPageController::class, 'audit']);

    Route::post('blog', [BlogController::class, 'store']);
    Route::get('blog', [BlogController::class, 'indexOnAdmin']);
    Route::get('add-blog', [BlogController::class, 'indexOnAddAdmin']);

    Route::post('shop/product', [AdminShopController::class, 'store']);
    Route::get('order-details/{order}', [OrderController::class, 'show']);
    Route::post('order/update/{userProduct}', [OrderController::class, 'update']);
    Route::get('coupons', [CouponController::class, 'index']);
    Route::post('coupon', [CouponController::class, 'create']);

    Route::get('subscription', [SubscriptionController::class, 'index']);
    Route::get('campaign', [CampaignController::class, 'index']);
    Route::post('campaign', [CampaignController::class, 'store']);
    Route::get('add-campaign', [CampaignController::class, 'show']);

    Route::post('order/details', [GenericOrderController::class, 'getOrderDetails']);
});
/** end admin routes */

/** start support routes */
Route::group(['prefix' => 'support'], function () {
    Route::post('/login', [SupportLoginController::class, 'login'])
        ->middleware('throttle:3,1');
    Route::post('/logout', [SupportLoginController::class, 'logout']);
    Route::get('/reset/password', [SupportHomeController::class, 'indexReset']);
    Route::get('/forgot/password', [SupportHomeController::class, 'indexForgot']);
    Route::get('/login', [SupportHomeController::class, 'indexLogin'])->name('support');

    Route::prefix('password')->group(function () {
        Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
        Route::post('reset', [ResetPasswordController::class, 'reset']);
    });
});

Route::group(['middleware' => ['auth:support'], 'prefix' => 'support'], function () {
    Route::get('/', [SupportHomeController::class, 'index']);

    Route::post('/account/change-password', [SupportAccountController::class, 'updatePassword']);
    Route::post('/account', [SupportAccountController::class, 'update']);

    Route::get('/data-tables', [SupportPageController::class, 'dataTables']);
    Route::get('/components', [SupportPageController::class, 'components']);
    Route::get('/blank-page', [SupportPageController::class, 'blankPage']);
    Route::get('/customers', [SupportPageController::class, 'customers']);
    Route::get('/error-404', [SupportPageController::class, 'error404']);
    Route::get('/error500', [SupportPageController::class, 'error500']);
    Route::get('/calendar', [SupportPageController::class, 'calendar']);
    Route::get('/compose', [SupportPageController::class, 'compose']);
    Route::get('/chat', [SupportPageController::class, 'chat']);

    Route::get('/product-details/{product}', [SupportPageController::class, 'productDetails']);
    Route::get('/form-input-groups', [SupportPageController::class, 'formInputGroups']);
    Route::get('/form-basic-inputs', [SupportPageController::class, 'formBasicInputs']);
    Route::get('/form-horizontal', [SupportPageController::class, 'formHorizontal']);
    Route::get('/product-success', [SupportPageController::class, 'productSuccess']);
    Route::get('/edit-user/{seller}', [SupportPageController::class, 'editUser']);

    Route::get('/edit-seller/{seller}', [SupportPageController::class, 'editSeller']);
    Route::get('/edit-role/{seller}', [SupportPageController::class, 'editRole']);
    Route::get('/form-vertical', [SupportPageController::class, 'formVertical']);
    Route::get('/product-fail', [SupportPageController::class, 'productFail']);
    Route::get('/tables-basic', [SupportPageController::class, 'tablesBasic']);
    Route::get('/lock-screen', [SupportPageController::class, 'lockScreen']);
    Route::get('/maps-vector', [SupportPageController::class, 'mapsVector']);
    Route::get('/blank-page', [SupportPageController::class, 'blankPage']);
    Route::get('/form-mask', [SupportPageController::class, 'formMask']);
    Route::get('/products', [SupportPageController::class, 'products']);
    Route::get('/profile', [SupportPageController::class, 'profile']);
    Route::get('/orders', [SupportPageController::class, 'orders']);
    Route::get('/inbox', [SupportPageController::class, 'inbox']);
    Route::get('/users', [SupportPageController::class, 'users']);
    Route::get('/roles', [SupportPageController::class, 'roles']);

    Route::get('edit-shop/{shop}', [SupportPageController::class, 'editShop']);
    Route::get('block/shop/{shop}', [SupportShopController::class, 'userAcessStatus']);

    Route::get('/edit-admin/{admin}', [SupportPageController::class, 'editAdmin']);
    Route::get('block/admin/{admin}', [SupportController::class, 'userAcessStatus']);

    Route::get('block/seller/{seller}', [SupportSellerController::class, 'userAcessStatus']);
    Route::get('seller/{seller}', [SupportSellerController::class, 'show']);

    Route::get('edit-customer/{user}', [SupportPageController::class, 'editCustomer']);
    Route::get('block/customer/{user}', [CustomerController::class, 'userAcessStatus']);

    Route::get('edit-support/{support}', [SupportPageController::class, 'editSupport']);
    Route::get('block/support/{support}', [SupportController::class, 'userAcessStatus']);

    Route::get('supports', [SupportPageController::class, 'supports']);
    Route::get('sellers', [SupportPageController::class, 'sellers']);
    Route::get('admins', [SupportPageController::class, 'admins']);
    Route::get('markets', [SupportPageController::class, 'shops']);
});
/** end support routes */

/** start user routes */
Auth::Routes();
Route::get('/', [HomeController::class, 'index']);
Route::get('faq', [UserPageController::class, 'faq']);
Route::get('404', [UserPageController::class, 'notFound']);
Route::post('contact', [ContactController::class, 'store']);
Route::get('contact', [UserPageController::class, 'contact']);
Route::post('search', [SearchController::class, 'searchProducts']);
Route::post('subscribe', [SubscriptionController::class, 'store']);
Route::get('detail/{product}', [UserPageController::class, 'detail']);
Route::get('category/{category}', [UserPageController::class, 'category']);
Route::get('terms-conditions', [UserPageController::class, 'termsConditions']);
Route::get('product-comparison', [UserPageController::class, 'productComparison']);

Route::group(['prefix' => 'login'], function () {
    Route::get('', [LoginController::class, 'index'])->name('login')->middleware('throttle:3,1');
    Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->middleware('throttle:3,1');
    Route::get('/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->middleware('throttle:3,1');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/cart/{product}', [CartController::class, 'order']);
    Route::get('/cart/delete/{product}', [CartController::class, 'delete']);
    Route::get('checkout', [UserPageController::class, 'checkout'])->name('checkout');
    Route::get('shopping-cart', [UserPageController::class, 'shoppingCart']);
    Route::get('my-wish-list', [UserPageController::class, 'myWishList']);
    Route::get('track-orders', [UserPageController::class, 'trackOrders']);

    Route::get('/success/{identity}', [PaymentController::class, 'paymentSuccessCallBack']);
    Route::post('/delivery/success/{identity}', [PaymentController::class, 'payOnDeliverySuccessCallBack']);
    Route::get('/cancel', [PaymentController::class, 'cancel']);
    Route::get('/notify', [PaymentController::class, 'notify']);
    Route::post('review/{product}', [ReviewController::class, 'store']);

    Route::post('coupon', [CouponController::class, 'applyCoupon'])->middleware('throttle:3,1');
    Route::get('coupon', [CouponController::class, 'destroy']);

    Route::post('blog/comment/{blog}', [BlogController::class, 'comment']);
});
/** end user routes */

/** start generic routes */

Route::get('seller/chats', [ChatController::class, 'index']);
Route::get('users', [ChatController::class, 'fetchAllUsers']);
Route::post('messages', [ChatController::class, 'sendMessage']);
Route::get('messages', [ChatController::class, 'fetchAllMessages']);

Route::get('process/payment/{id}', [MobileLoginController::class, 'login']);

Route::get('blog', [BlogController::class, 'index']);
Route::post('blog', [BlogController::class, 'store']);
Route::post('blog/{blog}', [BlogController::class, 'update']);
Route::get('blog/{blog}', [BlogController::class, 'destroy']);
Route::get('/blog-details/{blog}', [BlogController::class, 'show']);
Route::post('address', [AddressController::class, 'store']);
Route::get('address/{address}', [AddressController::class, 'destroy']);
/** end generic routes */

Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    echo 'cleared';
});

// Route::get('seed', function () {
//     Artisan::call('db:seed');
// });
Route::get('room', function () {
    return view('user.listen');
});
