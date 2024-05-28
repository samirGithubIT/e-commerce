<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BkashPaymentController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great! welcome
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('frontEnd.pages.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('customer/login', [CustomerAuthController::class, 'loginForm'])->name('customer.login');
Route::post('customer/login', [CustomerAuthController::class, 'login']);
Route::post('customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

Route::middleware('auth')->group(function () {

    Route::get('/billing_details', [CheckoutController::class, 'billingDetailsForm'])->name('billing_details'); 
    Route::post('billing/details/store', [CheckoutController::class, 'billingStore'])->name('billing.details.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); 
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // frontend order show
    Route::get('/my-orders', [OrderController::class, 'MyOrderIndex'])->name('my-orders');
    Route::get('/show-order/{id}', [OrderController::class, 'ShowOrder'])->name('show-order');
});

require __DIR__.'/auth.php';


Route::middleware('auth', 'is_admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard',function(){
        return view('backEnd.layout.master');
    });

    Route::resource('category', CategoryController::class);
    
    Route::resource('product',ProductController::class);

    // Route::get('/dashboard',[CategoryController::class,'index']);

    // Route::get('/dashboard/create',[ CategoryController::class, 'create']);

    // Route::post('/dashboard/store',[ CategoryController::class, 'store']);


    Route::resource('comment',CommentController::class);
    
    Route::resource('order',AdminOrderController::class);

    Route::post('order-accept',[AdminOrderController::class, 'acceptOrder'])->name('order.accept');
    Route::get('order-search',[AdminOrderController::class, 'search'])->name('order.search');
    Route::get('view-Invoice',[AdminOrderController::class, 'viewInvoice'])->name('order.invoice');

});

// Route::get('admin/comment',function(){
//     return view('backend.pages.comment.index');
// });

Route::get('/',[ HomeController::class, 'home']);

Route::post('product_modal/{productId}', [HomeController::class, 'ProductView']);
Route::get('checkout', [HomeController::class, 'checkoutView'])->name('checkout');
Route::post('process-checkout', [HomeController::class, 'processCheckout'])->name('proccess.checkout');

Route::get('order/payment', [HomeController::class, 'paymentIndex'])->name('order.payment');



Route::get('/contact',function(){
    return view('frontEnd.pages.contact');
});


// for bkash
Route::group(['middleware' => ['web']], function () {
    // Payment Routes for bKash
    Route::get('/bkash/payment', [BkashPaymentController::class,'index']);
    Route::get('/bkash/create-payment', [BkashPaymentController::class,'createPayment'])->name('bkash-create-payment');
    Route::get('/bkash/callback', [BkashPaymentController::class,'callBack'])->name('bkash-callBack');

});
