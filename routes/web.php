<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// Route::resource('/post',PostController::class)->middleware('auth');
Route::group(['middleware'=>'auth'],function(){
    Route::resource('/post',PostController::class)->except('index','show');
});
Route::resource('/post',PostController::class)->only('index','show');

Route::resource('/category',CategoryController::class)->middleware('can:admin');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/post', [PostController::class,'adminPostIndex'])->middleware(['auth', 'verified'])->name('admin.post');
Route::delete('/admin/post/{post}', [PostController::class,'adminPostDestroy'])->middleware(['auth', 'verified'])->name('admin.post.destroy');
Route::get('/admin/post/{id}', [PostController::class,'adminPostRestore'])->middleware(['auth', 'verified'])->name('admin.post.restore');
Route::delete('/admin/post/{id}/forcedelete', [PostController::class,'adminPostForceDelete'])->middleware(['auth', 'verified'])->name('admin.post.forcedelete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('/admin/role',RoleController::class);
Route::get('test/{id}/{prod}',function($id,$prod){
    return $id.'.'.$prod;
});
require __DIR__.'/auth.php';
Route::get('logout',function(){
    Auth::logout();
    return redirect('/');
})->name('auth.logout');
