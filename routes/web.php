<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
// Route::get('/product',[ProductController::class,'index'])->name('product.index');
// Route::get('/product',[App\Http\Controllers\ProductController::class,'index']);
// Route::get('/product/create',[ProductController::class,'create'])->name('product.create');

// Route::get('/test/product',[ProductController::class,'test']);
// Route::resource('/product',ProductController::class);

Route::resource('/post',PostController::class);

