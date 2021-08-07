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

Route::get('/', [FrontendController::class,'index'])->name('frontend.index');
Route::get('/cart', [FrontendController::class,'cart'])->name('frontend.cart');
Route::get('/checkout', [FrontendController::class,'checkout'])->name('frontend.checkout');
Route::get('/detail', [FrontendController::class,'detail'])->name('frontend.detail');
Route::get('/shop', [FrontendController::class,'shop'])->name('frontend.shop');


Route::get('/admin/login',[BackendController::class,'login'])->name('backend.login');
Route::get('/admin/forgot-password',[BackendController::class,'forgot_password'])->name('backend.forgot_password');
Route::get('/admin/index',[BackendController::class,'index'])->name('backend.index');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
