<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenController;


Route::get('/', function () {
    return view('user.home');
})->name('trangchu');

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
    });
});

;
