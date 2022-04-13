<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;

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
    return view('admin.master');
});

// Dashboard
Route::get ('/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

// Product
Route::get ('/product/index',[ProductController::class,'index'])->name('product.index');
Route::get ('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get ('/product/details/{id}',[ProductController::class,'details'])->name('product.details');
Route::get ('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put ('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get ('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');