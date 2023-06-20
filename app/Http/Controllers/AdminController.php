<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week

    return view('layout.admin', compact('currentDate', 'currentDay'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function customer()
    {
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        $user = User::where('role', 'user')->get();
        return view('admin.admincustomer', compact('user', 'currentDate', 'currentDay'));
    }

    public function searchUser(Request $request){
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        if ($request->has('search')) {
            // $produk =  Produk::where(['nama_produk','LIKE','%' .$request->search]);
            $user = User::where('name','LIKE','%' .$request->search. '%')->orWhere('email','LIKE','%' .$request->search. '%')->get();
            // ->paginate(20);
        } else {
            $user = User::where('role', 'user')->get();
            // $produk =  Produk::paginate(20);
        }
        return view('admin.admincustomer', compact('user', 'currentDate', 'currentDay'));

    }

    public function owner()
    {
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        $user = User::where('role', 'owner')->get();
        return view('admin.adminowner', compact('user', 'currentDate', 'currentDay'));
    }

    public function searchOwner(Request $request){
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        if ($request->has('search')) {
            // $produk =  Produk::where(['nama_produk','LIKE','%' .$request->search]);
            $user = User::where('name','LIKE','%' .$request->search. '%')->orWhere('email','LIKE','%' .$request->search. '%')->get();
            // ->paginate(20);
        } else {
            $user = User::where('role', 'owner')->get();
            // $produk =  Produk::paginate(20);
        }
        return view('admin.admincustomer', compact('user', 'currentDate', 'currentDay'));
    }

    public function order()
    {
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        $order = Order::all();
        return view('admin.adminorder', compact('order', 'currentDate', 'currentDay'));
    }

    public function searchOrder(Request $request){
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        if ($request->has('search')) {
            // $produk =  Produk::where(['nama_produk','LIKE','%' .$request->search]);
            $user = User::where('name','LIKE','%' .$request->search. '%')->orWhere('email','LIKE','%' .$request->search. '%')->get();
            // ->paginate(20);
        } else {
            $user = User::where('role', 'owner')->get();
            // $produk =  Produk::paginate(20);
        }
        return view('admin.admincustomer', compact('user', 'currentDate', 'currentDay'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
