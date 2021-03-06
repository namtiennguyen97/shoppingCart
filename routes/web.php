<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix'=>'shopping'], function (){
    Route::get('/',[\App\Http\Controllers\ProductController::class,'index'])->name('product.index');
    Route::get('/create',[\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/create',[\App\Http\Controllers\ProductController::class,'store'])->name('product.store');
    Route::get('/addCart/{id}',[\App\Http\Controllers\ProductController::class,'addCart'])->name('product.addCart');
    Route::get('/deleteCart/{id}', [\App\Http\Controllers\ProductController::class, 'deleteItemCart'])->name('product.deleteItemCart');
    Route::get('/cart-detail',[\App\Http\Controllers\ProductController::class,'cartDetail'])->name('product.cart.detail');
    Route::get('/delete-detail-cart/{id}',[\App\Http\Controllers\ProductController::class,'deleteCartDetail'])->name('product.delete.detail.cart');
});






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
