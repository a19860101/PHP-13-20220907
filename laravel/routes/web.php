<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/test/{id}/{page}',[TestController::class,'qwer']);
Route::get('/form',[TestController::class,'form']);
Route::post('/res',[TestController::class,'res']);

Route::get('/admin',function(){
    return view('admin.index');
});

// Product
Route::get('/admin/product',[ProductController::class,'index']);
Route::get('/admin/product/create',[ProductController::class,'create']);
Route::post('/admin/product',[ProductController::class,'store']);
Route::delete('/admin/product/{id}',[ProductController::class,'destroy']);
Route::get('/admin/product/{id}/edit',[ProductController::class,'edit']);
Route::put('/admin/product/{id}',[ProductController::class,'update']);

Route::get('/product',[ProductController::class,'front_index']);

// Category
//若使用resource controller
Route::resource('admin/category',CategoryController::class);
