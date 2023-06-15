<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Models\Produk;
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
Route::get('/', [ProdukController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', function () {
        return view('homepage', ['users' => User::get(),]);
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [ProdukController::class, 'index'])->name('home');
    Route::post('/pesan/{id}', [OrderController::class, 'pesan']);
    Route::get('/cart', [OrderController::class, 'keranjang']);
    // Route::get('/cart', function(){
    //     return view('cart');
    // });
    Route::delete('/keranjang/{id}', [OrderController::class, 'delete']);
    Route::post('check-out',[OrderController::class, 'checkout']);
    Route::get('/pay',[OrderController::class, 'pay'])->name('pay');
    Route::post('/midtrans-callingback',[OrderController::class, 'callback']);
    Route::get('/addproduct', [KategoriController::class, 'index']);
    Route::resource('produk', ProdukController::class);
    Route::resource('user', UserController::class);
});

// Route::get('/home', [HomeController::class, 'index'])
// ->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']
)->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register',[UserController::class,'store']
)->name('register-in');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/owner', function () {
    return view('owner');
})->name('owner');

Route::get('/ownerregis', function () {
    return view('ownerregister');
})->name('ownerregister');

Route::post('/ownerregis',[UserController::class,'storeOwner'])->name('owner-in');

Route::get('/produk/{slug}',[ProdukController::class,'show'])->name('produk');

Route::get('/produks',[ProdukController::class,'index'])->name('produk-search');