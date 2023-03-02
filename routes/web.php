<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('/category',[FrontendController::class,'category']);
Route::get('/category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('/category/{cate_slug}/{prod_slug}',[FrontendController::class,'viewproduct']);

Auth::routes();

Route::post('/add-to-cart',[CartController::class,'addProduct']);
Route::post('/delete-cart-item',[CartController::class,'deleteproduct']);

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class,'viewcart']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth','isAdmin'])->group(function() {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index');

    Route::get('categories', 'App\Http\Controllers\Admin\CategoryController@index');
    Route::get('add-category', 'App\Http\Controllers\Admin\CategoryController@add');
    Route::post('insert-category','App\Http\Controllers\Admin\CategoryController@insert');
    Route::get('edit-prod/{id}', 'App\Http\Controllers\Admin\CategoryController@edit');
    Route::put('update-category/{id}', 'App\Http\Controllers\Admin\CategoryController@update');
    Route::get('delete-category/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy');

    Route::get('products',[ProductController::class,'index']);
    Route::get('add-products',[ProductController::class,'add']);
    Route::post('insert-product',[ProductController::class,'insert']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::put('update-product/{id}',[ProductController::class,'update']);
    Route::get('delete-product/{id}',[ProductController::class,'destroy']);

});
