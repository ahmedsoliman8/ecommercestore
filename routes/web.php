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
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CustomerAddressController;
use App\Http\Controllers\Backend\ShippingCompanyController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Frontend\PaymentController;

Route::get('/', [FrontendController::class,'index'])->name('frontend.index');
Route::get('/cart', [FrontendController::class,'cart'])->name('frontend.cart');

//Checkout
Route::group(['middleware'=>['roles','role:customer']],function (){

    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('frontend.checkout');
    Route::post('/checkout/payment', [PaymentController::class, 'checkout_now'])->name('checkout.payment');
    Route::get('/checkout/{order_id}/cancelled', [PaymentController::class, 'cancelled'])->name('checkout.cancel');
    Route::get('/checkout/{order_id}/completed', [PaymentController::class, 'completed'])->name('checkout.complete');
    Route::get('/checkout/webhook/{order?}/{env?}', [PaymentController::class, 'webhook'])->name('checkout.webhook.ipn');
});





//Product
Route::get('/product/{slug?}', [FrontendController::class,'product'])->name('frontend.product');
//Shop
Route::get('/shop/{slug?}', [FrontendController::class,'shop'])->name('frontend.shop');
Route::get('/shop/tags/{slug}', [FrontendController::class,'shop_tag'])->name('frontend.shop_tag');

//WishList
Route::get('/wishlist', [FrontendController::class,'wishlist'])->name('frontend.wishlist');






Auth::routes(['verify'=>true]);

Route::group(['prefix'=>'admin','as'=>'admin.'],function (){
    Route::group(['middleware'=>'guest'],function (){
        Route::get('/login',[BackendController::class,'login'])->name('login');
        Route::get('/forgot-password',[BackendController::class,'forgot_password'])->name('forgot_password');
    });
    Route::group(['middleware'=>['roles','role:admin|supervisor']],function (){
        Route::get('/',[BackendController::class,'index'])->name('index_route');
        Route::get('/index',[BackendController::class,'index'])->name('index');
        //Account
        Route::get('/account_settings', [BackendController::class, 'account_settings'])->name('account_settings');
        Route::post('/admin/remove-image', [BackendController::class, 'remove_image'])->name('remove_image');
        Route::patch('/account_settings', [BackendController::class, 'update_account_settings'])->name('update_account_settings');
        //Product Categories
        Route::post('/product_categories/remove-image', [ProductCategoriesController::class, 'remove_image'])->name('product_categories.remove_image');
        Route::resource('product_categories',ProductCategoriesController::class);
        //Products
        Route::post('/products/remove-image', [ProductController::class, 'remove_image'])->name('products.remove_image');
        Route::resource('products',ProductController::class);
        //Tags
        Route::resource('tags',TagController::class);
        //ProductCoupons
        Route::resource('product_coupons', ProductCouponController::class);
        //Product Reviews
        Route::resource('product_reviews', ProductReviewController::class);
        //Customers
        Route::get('/customers/get_customers', [CustomerController::class, 'get_customers'])->name('customers.get_customers');
        Route::post('/customers/remove-image', [CustomerController::class, 'remove_image'])->name('customers.remove_image');
        Route::resource('customers', CustomerController::class);
        //Supervisors
        Route::post('/supervisors/remove-image', [SupervisorController::class, 'remove_image'])->name('supervisors.remove_image');
        Route::resource('supervisors', SupervisorController::class);
        //Countries
        Route::resource('countries', CountryController::class);
        //States
        Route::get('/states/get_states', [StateController::class, 'get_states'])->name('states.get_states');
        Route::resource('states', StateController::class);
        //Cities
        Route::get('/cities/get_cities', [CityController::class, 'get_cities'])->name('cities.get_cities');
        Route::resource('cities', CityController::class);
        //CustomerAddresses
        Route::resource('customer_addresses', CustomerAddressController::class);
        //Shipping Companies
        Route::resource('shipping_companies', ShippingCompanyController::class);
        //Payment Method
        Route::resource('payment_methods', PaymentMethodController::class);



    });


});




