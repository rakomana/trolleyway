<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\Web\User\SearchController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\VerificationController;
use App\Http\Controllers\Web\Seller\Auth\ResetPasswordController;
use App\Http\Controllers\Web\Seller\Auth\ForgotPasswordController;
use App\Http\Controllers\API\Auth\ConfirmPasswordController;
use App\Http\Controllers\API\Auth\SecondFactorLoginController;
use App\Http\Controllers\Web\Seller\ShopController;
use App\Http\Controllers\API\PayOrderController;
use App\Http\Controllers\Generic\MailController;

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show']);
});

Route::get('mail/emails', [MailController::class, 'indexUsers']);
Route::get('mail', [MailController::class, 'indexMails']);
Route::post('mail/email', [MailController::class, 'store']);

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login',[LoginController::class, 'login'])->middleware('throttle:20,60');
    Route::post('/register',[RegisterController::class, 'register']);

    Route::prefix('password')->group(function () {
        Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
        Route::post('reset', [ResetPasswordController::class, 'reset']);
    });
});

Route::middleware('auth:api_user')->group(function() {
    // limit for two requests in an hour
    Route::group(['prefix' => 'email'], function () {
        Route::get('/resend', [VerificationController::class, 'resend'])->name('verification.resend')->middleware('throttle:2,60');
        Route::get('/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::post('2fa/login', [SecondFactorLoginController::class, 'login']);
    });
});

// Route::group(['middleware' => ['auth:api_user', 'auth.2fa']], function () {
Route::middleware('auth:api_user')->group(function() {
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('user', [LoginController::class, 'user']);
    Route::post('logout',[LoginController::class, 'logout']);

    Route::group(['prefix' => 'product'], function () {
        Route::post('/pay/order', [PayOrderController::class, 'payOrder']);
        Route::get('/order/{product}/{quantity}', [ProductController::class, 'order']);
    });


    Route::group(['prefix' => 'account'], function () {
        Route::post('/update', [AccountController::class, 'update']);
    });
});

Route::group(['middleware' => ['shop'], 'prefix' => 'seller'], function () {
    Route::post('/register/shop', [ShopController::class, 'store']);
});