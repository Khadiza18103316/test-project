<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;



Route::get('/', function () {
    return view('admin.pages.dashboard.dash');
})->name('admin.dashboard');

// Dashboard
Route::get ('/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

// User
Route::get ('/user/index',[UserController::class,'index'])->name('user.index');
Route::get ('/user/registation',[UserController::class,'registation'])->name('user.registation');
Route::post('/user/store',[UserController::class,'store'])->name('user.store');
Route::get ('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::put ('/user/update/{id}',[U::class,'update'])->name('user.update');
Route::get ('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete');

// Product
Route::get ('/product/index',[ProductController::class,'index'])->name('product.index');
Route::get ('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get ('/product/details/{id}',[ProductController::class,'details'])->name('product.details');
Route::get ('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put ('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get ('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');