<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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
Route::get('/product/{product}',[ProductController::class,'front_show']);

// Category
//若使用resource controller
Route::resource('admin/category',CategoryController::class);

//Cart
Route::post('cart',[CartController::class,'addToCart']);
Route::get('cart',[CartController::class,'cartIndex']);
Route::delete('cart/{cart}',[CartController::class,'delete']);
Route::post('cart/empty',[CartController::class,'empty']);

//order
Route::post('/checkout',[OrderController::class,'checkout']);
Route::get('/result',function(){
    return view('order.result');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
