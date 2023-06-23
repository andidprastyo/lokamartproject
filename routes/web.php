<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
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


Route::group(['middleware' => 'role:admin'], function () {
Route::get('/admin', [AdminController::class,'index'])->name('admin');
Route::get('/admincus', [AdminController::class,'customer'])->name('adminuser');
Route::get('/admincus-search', [AdminController::class,'searchUser']);
Route::get('/adminow', [AdminController::class,'owner'])->name('adminowner');
Route::get('/adminow-search', [AdminController::class,'searchOwner']);
});

// Route::group(['middleware' => 'role:owner|user'], function () {
//     Route::get('/home', function () {
//         return view('homepage', ['users' => User::get(),]);
//     });
//     Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//     Route::get('/home', [ProdukController::class, 'index'])->name('home');
//     Route::post('/pesan/{id}', [OrderController::class, 'pesan']);
//     Route::get('/cart', [OrderController::class, 'keranjang'])->name('keranjang');
//     Route::delete('/keranjang/{id}', [OrderController::class, 'delete']);
//     Route::post('/check-out',[OrderController::class, 'checkout'])->name('checkout');
//     Route::get('/pesanan',[OrderController::class, 'pay'])->name('pay');
//     Route::post('/midtrans-callingback',[OrderController::class, 'callback']);
//     Route::resource('user', UserController::class);
//     Route::resource('order', OrderController::class);
//     Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
//     Route::get('/listorder', [OrderController::class, 'listorder'])->name('listorder');
//     // Route::resource('review', ReviewController::class);
// });

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('homepage', ['users' => User::get(),]);
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [ProdukController::class, 'index'])->name('home');
    Route::post('/pesan/{id}', [OrderController::class, 'pesan']);
    Route::get('/cart', [OrderController::class, 'keranjang'])->name('keranjang');
    Route::delete('/keranjang/{id}', [OrderController::class, 'delete']);
    Route::post('/check-out',[OrderController::class, 'checkout'])->name('checkout');
    Route::get('/pesanan',[OrderController::class, 'pay'])->name('pay');
    Route::get('user', [UserController::class, 'edit'])->name('user.edit');
    Route::resource('user', UserController::class);
    Route::resource('order', OrderController::class);
    Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::post('/review-store', [ReviewController::class, 'store'])->name('review-store');
    Route::get('/review/', [ProdukController::class, 'rating'])->name('review');
    Route::get('/review/create/{id}', [ReviewController::class,'create'])->name('review-create');
});

Route::group(['middleware' => 'role:owner'], function () {
    Route::get('/listproduks',[ProdukController::class,'list'])->name('list-search');
    Route::get('/listproduk', [ProdukController::class, 'list'])->name('list');
    Route::get('/listorder', [OrderController::class, 'listorder'])->name('listorder');
    Route::get('/addproduct', [KategoriController::class, 'index']);
    Route::resource('produk', ProdukController::class);
});

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

Route::get('/data-produk{slug}',[ProdukController::class,'show'])->name('data-produk');

Route::get('/produks',[ProdukController::class,'index'])->name('produk-search');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/produkall', [ProdukController::class, 'index'])->name('produkall');

Route::post('favorite-add/{id}', [WishlistController::class, 'favoriteAdd'])->name('favorite.add')->middleware('auth');
Route::delete('favorite-remove/{id}', [WishlistController::class, 'favoriteRemove'])->name('favorite.remove')->middleware('auth');
