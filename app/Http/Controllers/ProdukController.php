<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\ProdukRequest;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Review;
use App\Models\User;
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
            $produk = Produk::where('nama_produk','LIKE','%' .$request->search. '%')->with(['user','review'])
            ->orWhere('desk_produk','LIKE','%' .$request->search. '%')->get();
            // ->paginate(20);
        } else {
            $produk = Produk::with('review')->get();
            $rating = Review::with('produk')->get()[0]->produk;
            // $produk =  Produk::paginate(20);
        }   

        return view('homepage',compact(['produk', 'rating']));
    }

    public function rating(Produk $produk){
        $rating = Review::where('id_produk', $produk->id)->get()->avg('rating');
        // dd($rating);
        return view('homepage',compact('rating'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('addproduct', compact('kategori'));
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
        $review = Review::where('id_produk', $produk->id)->with('user')->get();
        $rating = Review::where('id_produk', $produk->id)->get()->avg('rating');
        // Jika produk tidak ditemukan, tampilkan halaman 404
        if (!$produk) {
            abort(404);
        }

        // Tampilkan halaman detail produk dengan data produk yang ditemukan
        return view('product', compact('produk', 'review', 'rating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $produk = Produk::with('kategori')->find($produk->id);
        $kategori = Kategori::all();
        return view('editproduct', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdukRequest $request, Produk $produk)
    {
        $data = $request->validated();
        if($request->file('gambar_produk')){
            $data['gambar_produk'] = $request->file('gambar_produk')->store('public/img/produk');
        }

        // $data->gambar_produk = $imagePath;
        $data['slug'] = Str::slug($data['nama_produk']);
        $produk->update($data);

        // $imagePath = $data->file('image')->store('public/img/produk');
        // $data->image = $imagePath;
        // $produk->save();
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }

    public function list(Request $request){
        if ($request->has('search')) {
            // $produk =  Produk::where(['nama_produk','LIKE','%' .$request->search]);
            $produk = Produk::where('nama_produk','LIKE','%' .$request->search. '%')
            ->orWhere('desk_produk','LIKE','%' .$request->search. '%')->with('user')->get();

            // $produk = (array) $produk;

            // $produk = array_filter($produk, function ($prod){
            //     return $prod['id_owner'] === Auth::user()->id;
            // });
            // $produk = (object) $produk;
            $filteredProduk = $produk->filter(function ($prod) {
                return $prod->user->id === Auth::user()->id;
            });

            $produk = $filteredProduk->values();

            // ->paginate(20);
        } else {
            $produk = Produk::where('id_owner', Auth::user()->id)->get();
            // $produk =  Produk::paginate(20);
        }
        return view('listproduct',compact(['produk']));
    }
}