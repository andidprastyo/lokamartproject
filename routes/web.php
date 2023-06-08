<?php

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
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/home', function () {
    return view('homepage');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/owner', function () {
    return view('owner');
});
Route::get('/ownerregis', function () {
    return view('ownerregister');
});
Route::get('/editprofile', function () {
    return view('editprofile');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/wishlistempty', function () {
    return view('wishlistempty');
});
Route::get('/cartempty', function () {
    return view('cartempty');
});
Route::get('/ordercomplete', function () {
    return view('ordercomplete');
});
Route::get('/cantfindpage', function () {
    return view('cantfindpage');
});
Route::get('/editproduct', function () {
    return view('editproduct');
});
Route::get('/wishlist', function () {
    return view('wishlist');
});
Route::get('/cart', function () {
    return view('cart');
});
