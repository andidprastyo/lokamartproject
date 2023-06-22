<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
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
    Route::get('/cart', [OrderController::class, 'keranjang'])->name('keranjang');
    // Route::get('/cart', function(){
    //     return view('cart');
    // });
    Route::delete('/keranjang/{id}', [OrderController::class, 'delete']);
    Route::post('/check-out',[OrderController::class, 'checkout'])->name('checkout');
    Route::get('/pesanan',[OrderController::class, 'pay'])->name('pay');
    Route::post('/midtrans-callingback',[OrderController::class, 'callback']);
    Route::get('/addproduct', [KategoriController::class, 'index']);
    Route::resource('produk', ProdukController::class);
    Route::resource('user', UserController::class);
    Route::resource('order', OrderController::class);
    Route::get('/listproduk', [ProdukController::class, 'list'])->name('list');
    Route::post('favorite-add/{id}', [WishlistController::class, 'favoriteAdd'])->name('favorite.add');
    Route::delete('favorite-remove/{id}', [WishlistController::class, 'favoriteRemove'])->name('favorite.remove');
    Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::get('/listorder', [OrderController::class, 'listorder'])->name('listorder');
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

Route::get('/listproduks',[ProdukController::class,'list'])->name('list-search');

Route::get('/admin', [AdminController::class,'index']);

Route::get('/admincus', [AdminController::class,'customer'])->name('adminuser');
Route::get('/admincus-search', [AdminController::class,'searchUser']);
Route::get('/adminow', [AdminController::class,'owner'])->name('adminowner');
Route::get('/adminow-search', [AdminController::class,'searchOwner']);

Route::resource('review', ReviewController::class);

Route::get('/review/', [ProdukController::class, 'rating'])->name('review');

Route::get('/review/create/{id}', [ReviewController::class,'create'])->name('review.create');

Route::patch('/produk/{id}/review', [ReviewController::class, 'create'])->name('produk.review');
