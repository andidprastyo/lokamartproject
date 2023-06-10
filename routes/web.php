<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register',[UserController::class,'store']
)->name('register-in');
Route::get('/home', function () {
    return view('homepage');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/owner', function () {
    return view('owner');
})->name('owner');
Route::get('/ownerregis', function () {
    return view('ownerregister');
