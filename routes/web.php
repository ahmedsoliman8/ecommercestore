<?php

use Illuminate\Support\Facades\Route;

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

use  App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\BackendController;
use  App\Http\Controllers\Backend\ProductCategoriesController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\ProductCouponController;
use App\Http\Controllers\Backend\ProductReviewController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\SupervisorController;

Route::get('/', [FrontendController::class,'index'])->name('frontend.index');
Route::get('/cart', [FrontendController::class,'cart'])->name('frontend.cart');
Route::get('/checkout', [FrontendController::class,'checkout'])->name('frontend.checkout');
Route::get('/detail', [FrontendController::class,'detail'])->name('frontend.detail');
Route::get('/shop', [FrontendController::class,'shop'])->name('frontend.shop');




Auth::routes(['verify'=>true]);

Route::group(['prefix'=>'admin','as'=>'admin.'],function (){
    Route::group(['middleware'=>'guest'],function (){
        Route::get('/login',[BackendController::class,'login'])->name('login');
        Route::get('/forgot-password',[BackendController::class,'forgot_password'])->name('forgot_password');
    });
    Route::group(['middleware'=>['roles','role:admin|supervisor']],function (){
        Route::get('/',[BackendController::class,'index'])->name('index_route');
        Route::get('/index',[BackendController::class,'index'])->name('index');
        Route::resource('product_categories',ProductCategoriesController::class);
        Route::post('/product_categories/remove-image', [ProductCategoriesController::class, 'remove_image'])->name('product_categories.remove_image');
        Route::resource('products',ProductController::class);
        Route::post('/products/remove-image', [ProductController::class, 'remove_image'])->name('products.remove_image');
        Route::resource('tags',TagController::class);
        Route::resource('product_coupons', ProductCouponController::class);
        Route::resource('product_reviews', ProductReviewController::class);

        //Customers
        Route::resource('customers', CustomerController::class);
        Route::post('/customers/remove-image', [CustomerController::class, 'remove_image'])->name('customers.remove_image');

        //Supervisors
        Route::resource('supervisors', SupervisorController::class);
        Route::post('/supervisors/remove-image', [SupervisorController::class, 'remove_image'])->name('supervisors.remove_image');


    });


});




