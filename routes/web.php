<?php

use App\Http\Controllers\BillsController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FacebookSocialiteController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaypalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\RoomSpaceController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ShowDataController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use GuzzleHttp\Middleware;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);

Route::get('/', [ShowDataController::class, 'index']);

Route::get('/admin', function () {
    return view('layouts/admin');
});


Route::get('/about', [ShowDataController::class, 'about']);
Route::get('/products', [ShowDataController::class, 'product']);
Route::get('/products/{rp_id}', [ShowDataController::class, 'product_rp']);
Route::post('/products/get_product/{rp_id}', [ShowDataController::class, 'get_product']);
Route::get('/products/detail/{p_id}', [ShowDataController::class, 'product_detail']);

Route::get('/projects', [ShowDataController::class, 'projects']);
Route::get('/projects/detail/{pr_id}', [ShowDataController::class, 'project_detail']);
Route::get('/news', [ShowDataController::class, 'news']);
Route::get('/news/detail/{n_id}', [ShowDataController::class, 'news_detail']);

Route::get('/add-to-cart/{p_id}', [CartController::class, 'add_to_cart'])->middleware(['auth','verified']);

Route::get('/buy-now/{p_id}', [CartController::class, 'buy_now'])->middleware(['auth','verified']);

Route::middleware(['auth','verified'])->prefix('cart')->group( function(){
    Route::get('/', [ShowDataController::class, 'cart']);
    Route::post('/add_qt/{c_id}', [ShowDataController::class, 'add_qt']);
    Route::post('/minus_qt/{c_id}', [ShowDataController::class, 'minus_qt']);
    // Route::get('/change', [ShowDataController::class, 'change']);
    // Route::get('/tax', [ShowDataController::class, 'tax']);
    Route::get('/total', [ShowDataController::class, 'total']);
    Route::post('/remove', [ShowDataController::class, 'remove']);
    Route::post('/checkout', [BillsController::class, 'checkout']);

    Route::post('/paypal', [BillsController::class, 'paypal']);

});


Route::get('/live-search', [ShowDataController::class, 'live_search']);
Route::post('/search', [ShowDataController::class, 'search']);

Route::post('/get_address', [ShowDataController::class, 'get_address']);


Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});







// Route::middleware(['auth:sanctum', 'verified','admin'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');

Route::get('/history', [ShowDataController::class, 'history'] )->middleware('verified');
Route::get('/history/detail/{b_id}', [ShowDataController::class, 'history_detail'] )->middleware('verified');


Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);

Route::prefix('google')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle']);
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle']);
});

Route::middleware(['auth:sanctum', 'verified','admin'])->prefix('dashboard')->group(function () {
    Route::get('/', [ShowDataController::class, 'adminhome']);

    Route::post('/bot/change_status/{bot_id}', [ShowDataController::class, 'consultation']);

    Route::prefix('room_space')->group(function () {
        Route::get('/create', [RoomSpaceController::class, 'create']);
        Route::post('/post_create', [RoomSpaceController::class, 'post_create']);
        Route::get('/update/{rp_id}', [RoomSpaceController::class, 'update']);
        Route::post('/post_update/{rp_id}', [RoomSpaceController::class, 'post_update']);
        Route::get('/list', [RoomSpaceController::class, 'list']);
        Route::delete('/delete/{rp_id}', [RoomSpaceController::class, 'delete']);
    });
    Route::prefix('type_product')->group(function () {
        Route::get('/create', [TypeProductController::class, 'create']);
        Route::post('/post_create', [TypeProductController::class, 'post_create']);
        Route::get('/update/{rp_id}', [TypeProductController::class, 'update']);
        Route::post('/post_update/{rp_id}', [TypeProductController::class, 'post_update']);
        Route::get('/list', [TypeProductController::class, 'list']);
        Route::delete('/delete/{rp_id}', [TypeProductController::class, 'delete']);

    });
    Route::prefix('product')->group(function () {
        Route::get('/create', [ProductController::class, 'create']);
        Route::post('/get_type', [ProductController::class, 'get_type']);
        Route::post('/post_create', [ProductController::class, 'post_create']);
        Route::get('/update/{p_id}', [ProductController::class, 'update']);
        Route::post('/post_update/{p_id}', [ProductController::class, 'post_update']);
        Route::get('/list', [ProductController::class, 'list']);
        Route::delete('delete/{p_id}', [ProductController::class, 'delete']);
        Route::get('/images/{p_id}', [ProductController::class, 'images']);
        Route::post('/post_images/{p_id}', [ProductController::class, 'post_images']);
        Route::get('/images/delete/{ip_id}',[ProductController::class, 'delete_img']);


    });

    Route::prefix('user')->group(function () {
        Route::get('/list', [UserController::class, 'list']);
        Route::post('/grant/{id}', [UserController::class, 'grant'])->middleware('super_admin');


    });
    Route::prefix('news')->group(function () {
        Route::get('/create', [NewsController::class, 'create']);
        Route::post('/post_create', [NewsController::class, 'post_create']);
        Route::get('/list', [NewsController::class, 'list']);
        Route::delete('/delete/{n_id}', [NewsController::class, 'delete']);
        Route::post('/post_update/{n_id}', [NewsController::class, 'post_update']);


    });
    Route::get('/news_update/{n_id}', [NewsController::class, 'update']);
    Route::prefix('project')->group(function () {
        Route::get('/create', [ProjectController::class, 'create']);
        Route::post('/post_create', [ProjectController::class, 'post_create']);
        Route::get('/list', [ProjectController::class, 'list']);
        Route::delete('/delete/{pr_id}', [ProjectController::class, 'delete']);
        Route::post('/post_update/{pr_id}', [ProjectController::class, 'post_update']);
        Route::get('/images/{pr_id}', [ProjectController::class, 'images']);
        Route::post('/post_images/{pr_id}', [ProjectController::class, 'post_images']);
        Route::get('/images/delete/{ipr_id}',[ProjectController::class, 'delete_img']);

    });
    Route::get('/project_update/{pr_id}', [ProjectController::class, 'update']);
    Route::prefix('team')->group(function () {
        Route::get('/create', [TeamController::class, 'create']);
        Route::post('/post_create', [TeamController::class, 'post_create']);
        Route::get('/update/{t_id}', [TeamController::class, 'update']);
        Route::post('/post_update/{t_id}', [TeamController::class, 'post_update']);
        Route::get('/list', [TeamController::class, 'list']);
        Route::delete('/delete/{t_id}', [TeamController::class, 'delete']);

    });
    Route::prefix('testimonial')->group(function () {
        Route::get('/create', [TestimonialController::class, 'create']);
        Route::post('/post_create', [TestimonialController::class, 'post_create']);
        Route::get('/update/{tt_id}', [TestimonialController::class, 'update']);
        Route::post('/post_update/{tt_id}', [TestimonialController::class, 'post_update']);
        Route::get('/list', [TestimonialController::class, 'list']);
        Route::delete('/delete/{tt_id}', [TestimonialController::class, 'delete']);
    });

    Route::prefix('bill')->group(function () {
        Route::get('/list', [BillsController::class, 'list']);
        Route::post('/change_status/{b_id}', [BillsController::class, 'change_status']);
        Route::get('/detail/{b_id}', [BillsController::class, 'bill_detail']);
    });

});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



