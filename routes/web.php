<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('contact', [ProductController::class, 'contact'])->name('contact');
Route::post('contact-us',[ProductController::class, 'contactus'])->name('contact-us');

Route::get('view_product', [ProductController::class, 'view_product'])->name('view_product');
Route::get('add_product',[ProductController::class, 'add_product'])->name('add_product');
Route::post('add_product',[ProductController::class, 'store_product'])->name('add_product.store');
Route::delete('/product/delete/{id}',[ProductController::class, 'product_destroy'])->name('delete_product');
Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('edit_product');
Route::post('/product/update/{id}',[ProductController::class, 'update'])->name('update_product');

Route::get('/product-detail/{id}', [ProductController::class, 'product_detail'])->name('productdetail');

Route::get('product_detail', [ProductController::class, 'product_detail'])->name('product_detail');

Route::get('add_banners',[BannerController::class, 'Banner'])->name('add_banners');
Route::post('add_banners',[BannerController::class, 'store_banners'])->name('add_banners.store');

Route::get('/cart',[CartController::class, 'cart'])->name('cart');
Route::post('/cartAdd', [CartController::class, 'saveCart'])->name('save_cart');
Route::any('/remove-cart/{id}', [CartController::class, 'removeCart'])->name('remove_cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');


Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');


Route::get('signup/{id?}',[LoginController::class, 'signup'])->name('signup');
Route::get('/signin', [LoginController::class, 'signin'])->name('signin');
Route::get('signout', function() {
    Auth::logout();
    Session::flash('flash_message', 'You have logged out  Successfully');
    Session::flash('alert-class', 'alert-success');
    return redirect('signin');
});
Route::post('register/{id?}',[LoginController::class, 'register'])->name('register');
Route::post('/signout', function () {
    Auth::logout();
    return redirect('/signin')->with('success', 'You have successfully signed out!');
})->name('signout');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/cart_item/{id}', [OrderController::class, 'cart_item'])->name('cart_item');
