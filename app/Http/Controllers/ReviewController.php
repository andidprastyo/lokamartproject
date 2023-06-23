<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Order_detail;
use App\Models\Review;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $order_detail = Order_detail::where('id', $id)->first();
        // dd($order_detail);
        // $produk = Produk::where('id','=',$order_detail->produk_id);
        $produk = DB::table('produk')->where('id',$order_detail->produk_id)->first();
        // dd($produk);
        return view('review', compact(['produk','order_detail']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {
        // $order_det = DB::table('order_details')->where('id', '=', $request->id_order_detail )->first();
        $order_det = Order_detail::findOrFail($request->id_order_detail);
        $order_det->review = "reviewed";
        $order_det->update();
        
        $data = $request->validated();
        // dd($data);
        Review::create($data);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
