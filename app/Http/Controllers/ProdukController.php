<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\ProdukRequest;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    # Fungsi index digunakan untuk mendapatkan data produk dan menampilkannya pada halaman homepage
    public function index(Request $request)
    {
        if ($request->has('kategori')) {
            if ($request->has('search')) {
                $produk = Produk::where(function ($query) use ($request) {
                    $query->where('id_kategori', $request->kategori)
                        ->orWhere('nama_produk', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('desk_produk', 'LIKE', '%' . $request->search . '%');
                })
                    ->with('review')
                    ->select('produk.*', DB::raw('AVG(review.rating) as average_rating'))
                    ->leftJoin('review', 'produk.id', '=', 'review.id_produk')
                    ->groupBy('produk.id')
                    ->get();
            } else {

                $produk = Produk::where('id_kategori', $request->kategori)->with('review')
                ->select('produk.*', DB::raw('AVG(review.rating) as average_rating'))
                ->leftJoin('review', 'produk.id', '=', 'review.id_produk')
                ->groupBy('produk.id')
                ->get();
                $kategori = Kategori::all();

                return view('homepage',compact(['produk', 'kategori']));
            }   
        } else {
            if ($request->has('search')) {
                $produk = Produk::where('nama_produk','LIKE','%' .$request->search. '%')->with('review')
                ->orWhere('desk_produk','LIKE','%' .$request->search. '%')
                ->select('produk.*', DB::raw('AVG(review.rating) as average_rating'))
                ->leftJoin('review', 'produk.id', '=', 'review.id_produk')
                ->groupBy('produk.id')->get();
            } else {
                $produk = Produk::with('review')
                ->select('produk.*', DB::raw('AVG(review.rating) as average_rating'))
                ->leftJoin('review', 'produk.id', '=', 'review.id_produk')
                ->groupBy('produk.id')
                ->get();
            }
            
        }
        $kategori = Kategori::all();

        return view('homepage',compact(['produk', 'kategori']));
    }

    /**
     * Show the form for creating a new resource.
     */

     # Fungsi create digunakan untuk mendapatkan data kategori dan menampilkannya sekaligus sebagai redirect ke halaman addproduct
    public function create()
    {
        $kategori = Kategori::all();
        return view('owner.addproduct', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */

    # Fungsi store digunakan untuk menerima inputan dan menyimpan inputan data ke database
    public function store(ProdukRequest $request)
    {
        $data = $request->validated();

        if($request->file('gambar_produk')){
            $data['gambar_produk'] = $request->file('gambar_produk')->store('public/img/produk');
        }

        $data['slug'] = Str::slug($request->nama_produk);
        Produk::create($data);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */

    # Fungsi show digunakan untuk mendapatkan dan menampilkan data produk secara spesifik beserta review dari produk tersebut
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

    # Fungsi edit digunakan untuk mendapatkan data produk & kategori dan mengirimkannya ke halaman editproduct sekaligus redirect ke editproduct
    public function edit(Produk $produk)
    {
        $produk = Produk::with('kategori')->find($produk->id);
        $kategori = Kategori::all();
        return view('owner.editproduct', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */

    # Fungsi update digunakan untuk menyimpan inputan data produk yang diubah pada halaman editproduct
    public function update(ProdukRequest $request, Produk $produk)
    {
        $data = $request->validated();
        if($request->file('gambar_produk')){
            $data['gambar_produk'] = $request->file('gambar_produk')->store('public/img/produk');
        }
        $data['slug'] = Str::slug($data['nama_produk']);
        $produk->update($data);
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    # Fungsi delete digunakan untuk menghapus produk
    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();
            } 
        catch (\Illuminate\Database\QueryException $e) {
        
                if($e->getCode() == "23000"){ //23000 is sql code for integrity constraint violation
                    return redirect()->route('listorder');
                }
            }
        

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }

    # Fungsi list digunakan untuk mendapatkan & menampilkan data produk yang dimiliki oleh owner  
    public function list(Request $request){
        if ($request->has('search')) {
            $produk = Produk::where('nama_produk','LIKE','%' .$request->search. '%')
            ->orWhere('desk_produk','LIKE','%' .$request->search. '%')->with('user')->get();

            $filteredProduk = $produk->filter(function ($prod) {
                return $prod->user->id === Auth::user()->id;
            });

            $produk = $filteredProduk->values();
        } else {
            $produk = Produk::where('id_owner', Auth::user()->id)->get();
        }
        return view('owner.listproduct',compact(['produk']));
    }
}