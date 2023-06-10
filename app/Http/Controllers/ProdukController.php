<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function store(ProdukRequest $request)
    {
        $data = $request->validated();
        $imagePath = $data->file('image')->store('public/img/produk');
        $data->image = $imagePath;
        Produk::create($data);
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
    public function update(ProdukRequest $request, Produk $produk)
    {
        $data = $request->validated();
        $produk = Produk::findOrFail($data);
        $produk->update($produk);

        $imagePath = $data->file('image')->store('public/img/produk');
        $data->image = $imagePath;
        $produk->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
    }
}
