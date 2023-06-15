<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\ProdukRequest;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stringable;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            // $produk =  Produk::where(['nama_produk','LIKE','%' .$request->search]);
            $produk =  Produk::where('nama_produk','LIKE','%' .$request->search. '%')->with('user')
            ->orWhere('desk_produk','LIKE','%' .$request->search. '%')->get();
            // ->paginate(20);
        } else {
            $produk =  Produk::all();
            // $produk =  Produk::paginate(20);
        }
        return view('homepage',compact(['produk']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addproduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdukRequest $request)
    {
        // $filename= date('YmdHi').$data->getClientOriginalName();
        // $imagePath = $data->file('image')->store('public/img/produk');
        // $data->image = $imagePath;
        // Produk::create($data);
        // $data = new Produk;
        $data = $request->validated();

        // $data->id_owner = Auth::user()->id;
        // $data->id_kategori = $request->input('kategori');
        // $data->nama_produk = $request->input('nama_produk');
        // $data->desk_produk = $request->input('desk_produk');
        // $data->stok_produk = $request->input('stok_produk');
        // $data->harga_produk = $request->input('harga_produk');


        // $imagePath = $data->file('image')->store('public/img/produk');
        if($request->file('gambar_produk')){
            $data['gambar_produk'] = $request->file('gambar_produk')->store('public/img/produk');
        }



        // $data->gambar_produk = $imagePath;
        $data['slug'] = Str::slug($request->nama_produk);
        Produk::create($data);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Temukan produk berdasarkan slug
        $produk = Produk::where('slug', $slug)->first();

        // Jika produk tidak ditemukan, tampilkan halaman 404
        if (!$produk) {
            abort(404);
        }

        // Tampilkan halaman detail produk dengan data produk yang ditemukan
        return view('product', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $produk = Produk::with('kategori')->find($produk->id);
        $kategori = Kategori::all();
        return view('editproduct', ['produk' => $produk, 'kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdukRequest $request, Produk $produk)
    {
        $data = $request->validated();
        if($request->file('image')){
            $data->gambar_produk = $request->file('image')->store('public/img/produk');
        }

        // $data->gambar_produk = $imagePath;
        $data->slug = Str::slug($data['nama_produk']);
        $produk->flll($data);
        $produk->save();

        // $imagePath = $data->file('image')->store('public/img/produk');
        // $data->image = $imagePath;
        // $produk->save();
        return view('homepage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
    }

    public function list(Produk $produk){
        return view('listproduk', compact('produk'));
    }
}