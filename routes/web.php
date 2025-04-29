<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('homepage');
Route::get('/login',[HomeController::class,'login'])->name('login');

Route::get('/admin',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/category',[AdminController::class,'manageCategory'])->name('admin.manageCategory');
Route::post("/admin/category",[AdminController::class,'createCategory'])->name('admin.createCategory');
Route::get("/admin/product",[ProductController::class,'index'])->name('admin.manageProduct');
Route::get("/admin/product/insert",[ProductController::class,'insert'])->name('admin.insertProduct');
Route::post("/admin/product/insert",[ProductController::class,'store'])->name('admin.storeProduct');

//for delete
Route::delete('/admin/category/{category}',[CategoryController::class,'deleteCategory'])->name('admin.deleteCategory');
Route::delete("/admin/product/{product}",[ProductController::class,'deleteProduct'])->name('admin.deleteProduct');

//for edit
Route::get('/edit/{product}',[ProductController::class,'editForm'])->name('admin.editProduct');
Route::put('/edit/{product}',[ProductController::class,'updateData'])->name('admin.updateProduct');
Route::get('/edits/{category}',[CategoryController::class,'editForm'])->name('admin.editCategory');
Route::put('/edits/{category}',[CategoryController::class,'updateData'])->name('admin.updateCategory');