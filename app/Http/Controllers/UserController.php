<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

    # Fungsi store digunakan untuk menerima inputan data user dan menyimpannya ke database
    public function store(UserRequest $request)
    {
        $data = new User;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->role = $request->input('role', 'user');
        $data->password = $request->input('password');
        $data['password'] = Hash::make($request->password);
        $data->save();
        return redirect()->route('login');
    }

    # Fungsi storeOwner digunakan untuk menerima inputan data user dengan role owner dan menyimpannya ke database
    public function storeOwner(UserRequest $request)
    {
        $data = new User;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->role = $request->input('role', 'owner');
        $data->password = $request->input('password');
        $data['password'] = Hash::make($request->password);
        $data->save();
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */

    # Fungsi edit digunakan untuk mendapatkan data user yang sesuai dengan parameter dan menampilkan pada editprofile
    public function edit(User $user)
    {
        return view('editprofile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */

    # Fungsi update digunakan untuk menerima inputan editprofile dan mengupdate data user sesuai parameter
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->fill($data);
        $user->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */

    # Fungsi destroy digunakan untuk menghapus data user dari dataabase
    public function destroy(User $user)
    {
        $user->delete();
    }
}
