<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    # Fungsi index digunakan untuk mendapatkan data tanggal & hari yang akan ditampilkan pada halaman admin
    public function index()
    {
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week

    return view('layout.admin', compact('currentDate', 'currentDay'));
    }

    /**
     * Show the form for creating a new resource.
     */

    # Fungsi customer digunakan untuk mendapatkan data user yang memiliki role user(disini sebagai customer)
    public function customer()
    {
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        $user = User::where('role', 'user')->get();
        return view('admin.admincustomer', compact('user', 'currentDate', 'currentDay'));
    }

    # Fungsi searchUser digunakan untuk mendapatkan data user yang memiliki role user saat dilakukan pencarian menggunakan search berdasarkan nama atau email
    public function searchUser(Request $request){
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        if ($request->has('search')) {
            $user = User::where('name','LIKE','%' .$request->search. '%')->orWhere('email','LIKE','%' .$request->search. '%')->get();
            #Jika ingin menggunakan paginate, bisa menguncomment kode paginate dibawah
            // ->paginate(20);
        } else {
            $user = User::where('role', 'user')->get();
            #Jika ingin menggunakan paginate, bisa menguncomment kode paginate dibawah
            // $user =  User::where('role', 'user')->paginate(20);
        }
        return view('admin.admincustomer', compact('user', 'currentDate', 'currentDay'));

    }

    # Fungsi owner digunakan untuk mendapatkan data user yang memiliki role owner
    public function owner()
    {
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        $user = User::where('role', 'owner')->get();
        return view('admin.adminowner', compact('user', 'currentDate', 'currentDay'));
    }

    # Fungsi searchUser digunakan untuk mendapatkan data user yang memiliki role owner saat dilakukan pencarian menggunakan search berdasarka nama atau email
    public function searchOwner(Request $request){
        $currentDate = Carbon::now()->format('d-m-Y'); // Format the date as desired
        $currentDay = Carbon::now()->format('l'); // Get the day of the week
        if ($request->has('search')) {
            $user = User::where('name','LIKE','%' .$request->search. '%')->orWhere('email','LIKE','%' .$request->search. '%')->get();
            #Jika ingin menggunakan paginate, bisa menguncomment kode paginate dibawah
            // ->paginate(20);
        } else {
            $user = User::where('role', 'owner')->get();
            #Jika ingin menggunakan paginate, bisa menguncomment kode paginate dibawah
            // $user =  User::where('role', 'user')->paginate(20);
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
