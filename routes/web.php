<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
//  --------------------------------------- Categories ---------------------------------------------------------
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::get('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    Route::PATCH('/categories/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
//   ---------------------------------- Tags -------------------------------------------
    Route::get('/tags', [TagController::class, 'index'])->name('admin.tag.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('admin.tag.create');
    Route::post('/tags/store', [TagController::class, 'store'])->name('admin.tag.store');
    Route::PATCH('/tags/update/{tag}', [TagController::class, 'update'])->name('admin.tag.update');
    Route::get('/tags/edit/{tag}', [TagController::class, 'edit'])->name('admin.tag.edit');
    Route::post('/tags/delete/{tag}', [TagController::class, 'destroy'])->name('admin.tag.delete');
//-------------------------------------- Coupons -------------------------------------------
    Route::get('/coupons', [CouponController::class, 'index'])->name('admin.coupon.index');
    Route::get('/coupons/create', [CouponController::class, 'create'])->name('admin.coupon.create');
    Route::post('/coupons/store', [CouponController::class, 'store'])->name('admin.coupon.store');
    Route::get('/coupons/edit/{coupon}', [CouponController::class, 'edit'])->name('admin.coupon.edit');
    Route::post('/coupons/delete/{coupon}', [CouponController::class, 'destroy'])->name('admin.coupon.delete');
    Route::PATCH('/coupons/update/{coupon}', [CouponController::class, 'update'])->name('admin.coupon.update');
//-------------------------------------------Prodcuts----------------------------------------
    Route::get('products/', [ProductController::class,'index'])->name('admin.product.index');
    Route::get('products/create', [ProductController::class,'create'])->name('admin.product.create');
    Route::get('products/show/{product}', [ProductController::class,'show'])->name('admin.product.show');
    Route::get('products/edit/{product}/{attribute}', [ProductController::class,'editAttribute'])->name('admin.product.attribute.edit');
    Route::get('products/delete/{product}/{attribute}', [ProductController::class,'destroyAttribute'])->name('admin.product.attribute.edit');
    Route::get('products/edit/{product}', [ProductController::class,'edit'])->name('admin.product.edit');
    Route::get('products/destroy/{product}', [ProductController::class,'destroy'])->name('admin.product.delete');
});

