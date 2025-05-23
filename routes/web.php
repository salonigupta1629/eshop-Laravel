<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//home routes
Route::controller(HomeController::class)->group(function(){
    Route::get('/','home')->name('homepage');
    Route::get('/search','search')->name('search');
    Route::get('/filter/{catId}','filter')->name('filter');

});


//auth routes
Route::match(['get','post'],'/login',[AuthController::class,'login'])->name('login');
Route::match(['get','post'],'/register',[AuthController::class,'register'])->name('register');


Route::prefix("admin")->group(function(){
    Route::get('',[AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::controller(CategoryController::class)->group(function(){

        Route::get('/category','manageCategory')->name('admin.manageCategory');
        Route::post("/category",'createCategory')->name('admin.createCategory');
         //for delete
    Route::delete('/category/{id}','deleteCategory')->name('admin.deleteCategory');
//for edit
Route::put('/category/{id}','updateData')->name('admin.updateCategory');

    });


    Route::controller(ProductController::class)->group(function(){

        Route::get("/product",'index')->name('admin.manageProduct');
        Route::get("/product/insert",'insert')->name('admin.insertProduct');
        Route::post("/product/insert",'store')->name('admin.storeProduct');
             //for delete
        Route::delete("/product/{id}",'deleteProduct')->name('admin.deleteProduct'); 
    //for edit
    // Route::get('/edit/{product}','editForm')->name('admin.editProduct');
    Route::put('/product/{id}','updateData')->name('admin.updateProduct');
});

    });
   