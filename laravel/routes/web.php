<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

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

Route::get('/', [PageController::class,'index']);

Route::get('/test/{id}/{page}',[TestController::class,'qwer']);
Route::get('/form',[TestController::class,'form']);
Route::post('/res',[TestController::class,'res']);



// 後台管理
Route::middleware(['can:admin'])->group(function(){
    Route::get('/admin',function(){
        return view('admin.index');
    });
    Route::get('/admin/product',[ProductController::class,'index']);
    Route::get('/admin/product/create',[ProductController::class,'create']);
    Route::post('/admin/product',[ProductController::class,'store']);
    Route::delete('/admin/product/{id}',[ProductController::class,'destroy']);
    Route::get('/admin/product/{id}/edit',[ProductController::class,'edit']);
    Route::put('/admin/product/{id}',[ProductController::class,'update']);

    Route::get('/admin/banner',[BannerController::class,'index']);
    Route::post('/admin/banner',[BannerController::class,'store']);
    Route::delete('/admin/banner/{banner}',[BannerController::class,'delete']);

    Route::get('/admin/deleteCover/{id}',[CategoryController::class,'deleteCover']);
    Route::get('/admin/post',[PostController::class,'admin_post']);
    Route::get('/admin/post/{post}',[PostController::class,'admin_post_show']);
    Route::delete('/admin/post/{post}',[PostController::class,'admin_post_delete']);

    Route::resource('/admin/tag',TagController::class);

});
Route::resource('admin/category',CategoryController::class)->middleware(['can:admin']);
// post
Route::resource('/user/post',PostController::class);
Route::get('/user/post/deleteCover/{id}',[PostController::class,'deleteCover']);
Route::get('/post',[PostController::class,'front_index']);
Route::get('/post/{post}',[PostController::class,'front_show']);

// prodcut
Route::get('/product',[ProductController::class,'front_index']);
Route::get('/product/{product}',[ProductController::class,'front_show']);
Route::get('/product/category/{slug}',[ProductController::class,'front_product_category']);

// Category
//若使用resource controller

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
Route::get('/order-list',[OrderController::class,'orderList']);
Route::get('/order-detail/{order}',[OrderController::class,'detail']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
