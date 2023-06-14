<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($id)
    {
        $produk = Produk::find($id);
        return view('layouts.user.detailProduk', compact(['produk']));
    }
    public function pesan(Request $request, $id)
    {
        $produk = Produk::find($id);

        // validasi apakah melebihi request
        if ($request->qty > $produk->stok_produk) {
            return redirect('pesan/', $id);
        }

        // cek validasi
        $cek_pesanan = Order::where('user_id', Auth::user()->id)->where('status', 'keranjang')->first();
        if (empty($cek_pesanan)) {
            $timestamp = time(); // Mendapatkan timestamp saat ini
            $randomNumber = mt_rand(1000, 9999); // Mendapatkan angka acak antara 1000 dan 9999

            $transactionId = $timestamp . $randomNumber; // Menggabungkan timestamp dan angka acak

            // simpan ke database pesanan
            $pesanan = new Order;
            $pesanan->id = $transactionId;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->status = 'keranjang';
            $pesanan->total = 0;
            $pesanan->id_shipper = 1;
            $pesanan->save();
        }



        // simpan ke pesanan detail
        $pesanan_baru = Order::where('user_id', Auth::user()->id)->where('status', 'keranjang')->first();

        // cek pesanan detail apakah barang sudah di inputkan
        $cek_detail_pesanan = Order_detail::where('produk_id', $produk->id)->where('order_id', $pesanan_baru->id)->first();
        if (empty($cek_detail_pesanan)) {
            $detail_pesanan = new Order_detail;
            $detail_pesanan->produk_id = $id;
            $detail_pesanan->order_id = $pesanan_baru->id;
            $detail_pesanan->qty = 1;
            $detail_pesanan->subtotal = $produk->harga_produk;
            $detail_pesanan->save();
        } else {
            $detail_pesanan = Order_detail::where('produk_id', $produk->id)->where('order_id', $pesanan_baru->id)->first();
            $detail_pesanan->qty = $detail_pesanan->qty + 1;

            // harga sekarang
            $detail_pesanan_update_harga = $produk->harga_produk;
            $detail_pesanan->subtotal = $detail_pesanan->subtotal + $detail_pesanan_update_harga;
            $detail_pesanan->update();
        }

        // total
        $pesanan = Order::where('user_id', Auth::user()->id)->where('status', 'keranjang')->first();
        $pesanan->total = $pesanan->total + $produk->harga_produk;
        $pesanan->update();

        return redirect('/home');
    }
    public function keranjang()
    {
        $pesanan = Order::where('user_id', Auth::user()->id)->where('status', 'keranjang')->first();

        if (!empty($pesanan)) {
            // $detail_pesanan = Order_detail::where('order_id',$pesanan->id)->get();
            // $produk = Produk::findOrFail($detail_pesanan->produk_id);
            // $owner = User::where('id',$produk->id_owner)->get();
            $detail_pesanan = Order_detail::where('order_id', $pesanan->id)->get();
            $produk = [];
            $owner = [];
            foreach ($detail_pesanan as $detail) {
                $produkItem = Produk::find($detail->produk_id);
                $owner[] = User::find($produkItem->id_owner);
                $produkItem->setAttribute('user', $owner);

                $produk[] = $produkItem;
            }
            return view('cart', compact('pesanan', 'detail_pesanan', 'produk', 'owner'));
        }
        return view('cart', compact('pesanan'));
    }
    public function delete($id)
    {
        $detail_pesanan = Order_detail::where('id', $id)->first();

        // mengurangi total pada pesanan
        $pesanan = Order::where('id', $detail_pesanan->order_id)->first();
        $pesanan->total = $pesanan->total - $detail_pesanan->subtotal;
        $pesanan->update();

        $detail_pesanan->delete();

        return redirect('/cart');
    }
    public function checkout(Request $request)
    {
        $pesanan =  Order::where('user_id', Auth::user()->id)->where('status', "keranjang")->first();
        $pesanan_id = $pesanan->id;

        $pesanan->nama_penerima = $request->nama_penerima;
        $pesanan->notelp_penerima = $request->notelp_penerima;
        $pesanan->catatan_order = $request->catatan_order;
        $pesanan->provinsi = $request->provinsi;
        $pesanan->kota = $request->kota;
        $pesanan->kecamatan = $request->kecamatan;
        $pesanan->kelurahan = $request->kelurahan;
        $pesanan->detail_alamat = $request->detail_alamat;
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pesanan->id,
                'gross_amount' => $pesanan->total,
            ),
            'customer_details' => array(
                'name' => $request->nama,
                'email' => Auth::user()->email,
                // 'phone' => $request->notelp_penerima,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $pesanan->status = 'checkout';
        $pesanan->token = $snapToken;
        $pesanan->update();

        $detail_pesanan = Order_detail::where('order_id', $pesanan_id)->get();
        foreach ($detail_pesanan as $dp) {
            $produk = Produk::where('id', $dp->produk_id)->first();
            $produk->stok_produk = $produk->stok_produk - $dp->qty;
            $produk->update();
        }

        return redirect()->route('pay');
    }
    public function pay()
    {
        $pesanan = Order::where('user_id', Auth::user()->id)->where('paid', 'unpaid')->get();
        $pesanan_id = $pesanan->pluck('id');

        $detail_pesanan = Order_detail::whereIn('order_id', $pesanan_id)->get();

        return view('pay', compact(['detail_pesanan', 'pesanan']));
    }
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("SHA512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $pesanan = Order::find($request->order_id);
                $pesanan->update(['paid' => 'paid']);
            }
        }
    }
}
