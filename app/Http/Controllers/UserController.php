<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Request;
use App\Models\User;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        // $user = User::find($user);
        // if (!$user) {
        //     // Mengembalikan respons jika pengguna tidak ditemukan
        //     $data = $request->validated();
        //     User::create($data);
        // }
        // $user->update([
        //     'role' => 'owner'
        // ]);

        // Set the default role
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
