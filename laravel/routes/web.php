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

Route::get('20221116/', [PageController::class,'index'])->name('index');

Route::get('20221116/test/{id}/{page}',[TestController::class,'qwer']);
Route::get('20221116/form',[TestController::class,'form']);
Route::post('20221116/res',[TestController::class,'res']);



// 後台管理
Route::middleware(['can:admin'])->group(function(){
    Route::get('20221116/admin',function(){
        return view('admin.index');
    });
    Route::get('20221116/admin/product/',[ProductController::class,'index']);
    Route::get('20221116/admin/product/create',[ProductController::class,'create']);
    Route::post('20221116/admin/product',[ProductController::class,'store']);
    Route::delete('20221116/admin/product/{id}',[ProductController::class,'destroy']);
    Route::get('20221116/admin/product/{id}/edit',[ProductController::class,'edit']);
    Route::put('20221116/admin/product/{id}',[ProductController::class,'update']);

    Route::get('20221116/admin/banner',[BannerController::class,'index']);
    Route::post('20221116/admin/banner',[BannerController::class,'store']);
    Route::delete('20221116/admin/banner/{banner}',[BannerController::class,'delete']);

    Route::get('20221116/admin/deleteCover/{id}',[CategoryController::class,'deleteCover']);
    Route::get('20221116/admin/post',[PostController::class,'admin_post']);
    Route::get('20221116/admin/post/{post}',[PostController::class,'admin_post_show']);
    Route::delete('20221116/admin/post/{post}',[PostController::class,'admin_post_delete']);
    Route::get('20221116/admin/post/restore/{post}',[PostController::class,'admin_post_restore']);
    Route::post('20221116/admin/post/forceDelete/{post}',[PostController::class,'admin_post_forceDelete']);

    Route::resource('20221116/admin/tag',TagController::class);

});
Route::resource('20221116/admin/category',CategoryController::class)->middleware(['can:admin']);
// post
Route::resource('20221116/user/post',PostController::class);
Route::get('20221116/user/post/deleteCover/{id}',[PostController::class,'deleteCover']);
Route::get('20221116/post',[PostController::class,'front_index']);
Route::get('20221116/post/{post}',[PostController::class,'front_show']);

// prodcut
Route::get('20221116/product',[ProductController::class,'front_index']);
Route::get('20221116/product/{product}',[ProductController::class,'front_show'])->name('front.product.show');
Route::get('20221116/product/category/{slug}',[ProductController::class,'front_product_category']);

// Category
//若使用resource controller

//Cart
Route::post('20221116/cart',[CartController::class,'addToCart']);
Route::get('20221116/cart',[CartController::class,'cartIndex']);
Route::delete('20221116/cart/{cart}',[CartController::class,'delete']);
Route::post('20221116/cart/empty',[CartController::class,'empty']);

//order
Route::post('20221116/checkout',[OrderController::class,'checkout']);
Route::get('20221116/result',function(){
    return view('order.result');
});
Route::get('20221116/order-list',[OrderController::class,'orderList']);
Route::get('20221116/order-detail/{order}',[OrderController::class,'detail']);


Route::get('20221116/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
