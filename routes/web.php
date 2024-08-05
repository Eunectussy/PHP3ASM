<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\User\HomeController;

Route::get('/', function () {
    return view('user.detailproduct');
})->name('trangchu');

Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('users/searchProduct', [HomeController::class, 'searchProduct'])->name('searchProduct');
Route::get('users/product/{id}', [HomeController::class, 'detailProduct'])->name('clientDetailProduct');
Route::get('users/category/{id}', [HomeController::class, 'categoryProduct'])->name('categoryProduct');




Route::get('/login', [AuthenController::class, 'login'])->name('login');
Route::post('/login', [AuthenController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthenController::class, 'logout'])->name('logout');
Route::get('/register', [AuthenController::class, 'register'])->name('register');
Route::post('/register', [AuthenController::class, 'postRegister'])->name('postRegister');





Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkAdmin'], function(){
    Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
        Route::get('/', [ProductController::class, 'listProducts'])->name('listProducts');
        Route::get('/add-product', [ProductController::class,'addProducts'])->name('addProducts');
        Route::post('/add-product', [ProductController::class,'addPostProducts'])->name('addPostProducts');
        // Route::delete('/delete-product', [ProductController::class,'deleteProduct'])->name('deleteProducts');      
        Route::get('/delete-product/{id}', [ProductController::class,'deleteProduct'])->name('deleteProducts'); 
        Route::get('detail-product/{id}', [ProductController::class, 'detailProduct'])->name('detailProducts');
        Route::get('update-product/{id}', [ProductController::class, 'updateProduct'])->name('updateProducts');
        Route::patch('update-product/{id}', [ProductController::class, 'updatePatchProduct'])->name('updatePatchProducts');
    });
    Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
        Route::get('/', [UserController::class, 'listUsers'])->name('listUsers');
        Route::get('/add-user', [UserController::class,'addUsers'])->name('addUsers');
        Route::post('/add-user', [UserController::class,'addPostUsers'])->name('addPostUsers');
        Route::get('/delete-user/{id}', [UserController::class,'deleteUsers'])->name('deleteUsers'); 
        Route::get('detail-user/{id}', [UserController::class, 'detailUsers'])->name('detailUsers');
        Route::get('update-user/{id}', [UserController::class, 'updateUsers'])->name('updateUsers');
        Route::patch('update-user/{id}', [UserController::class, 'updatePatchUsers'])->name('updatePatchUsers');
    });
    Route::group(['prefix' => 'category', 'as' => 'category.'], function(){
        Route::get('/', [CategoryController::class, 'listCategory'])->name('listCategory');
        Route::get('/add-category', [CategoryController::class,'addCategory'])->name('addCategory');
        Route::post('/add-category', [CategoryController::class,'addPostCategory'])->name('addPostCategory');
        Route::get('/delete-category/{id}', [CategoryController::class,'deleteCategory'])->name('deleteCategory'); 
        Route::get('detail-category/{id}', [CategoryController::class, 'detailCategory'])->name('detailCategory');
        Route::get('update-category/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::patch('update-category/{id}', [CategoryController::class, 'updatePatchCategory'])->name('updatePatchCategory');
    });
});

;
