<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;

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
    Route::get('/categories',[CategoryController::class,'index'])->name('admin.category.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('admin.category.create');
    Route::post('/categories/store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('/categories/edit/{category}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::get('/categories/delete/{category}',[CategoryController::class,'destroy'])->name('admin.category.delete');
    Route::PATCH('/categories/update/{category}',[CategoryController::class,'update'])->name('admin.category.update');
});

