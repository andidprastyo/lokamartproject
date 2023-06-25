<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Maize\Markable\Models\Favorite;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    #Fungsi wishlist digunakan untuk mendapatkan data wishlist user dan ditampilkan pada halaman wishlist
    public function wishlist()
    {
        $products = Produk::whereHasFavorite(
            auth()->user()
        )->get();
        return view('wishlist', compact('products'));
    }

    # Fungsi favoriteAdd digunakan untuk menyimpan dan menambahkan data produk ke wishlist user
    public function favoriteAdd($id)
    {
        $product = Produk::find($id);
        $user = auth()->user();
        if ($product && $user) {
            Favorite::add($product, $user);
            session()->flash('success', 'Product is added to favorites successfully!');
        } else {
            session()->flash('error', 'Unable to add product to favorites. You must login to favorites');
        }

        return redirect()->route('home');
    }

    # Fungsi favoriteRemove digunakan untuk menghappus data produk dari wishlist user
    public function favoriteRemove($id)
    {
        $product = Produk::find($id);
        $user = auth()->user();
        Favorite::remove($product, $user);
        session()->flash('success', 'Product is Remove to Favorite Successfully !');

        return redirect()->route('home');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
