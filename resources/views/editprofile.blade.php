@extends('layout.template')
@section('content')
    <div class="my-20 mx-24">
        <h1 class="text-3xl font-bold">Profile</h1>
        <p class="mt-3">Complete Your Detail Information</p>
        <form action="">
            <div class="flex flex-col gap-3 mt-3">
                <input type="text" id="name"
                    class="bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5"
                    placeholder="Name" required>
                <input type="email" id="email"
                    class="bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5"
                    placeholder="Email" required>
                <div class="relative w-64">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <div class="text-gray-900/50">
                            <button type="button" id="btnshow" onclick="showPassword(), changetext()"><i
                                style="font-size: 16px" class='bx bxs-show'></i></button>
                        </div>
                    </div>
                    <input type="password" id="password"
                    class="block bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5"
                    placeholder="Password" required>
                </div>
            </div>
            <div class="flex gap-3 mt-5">
                <button type="button" class="drop-shadow-lg focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Reset</button>
                <button type="button" class="drop-shadow-lg text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Back to Homepage</button>
                <button type="button" class="drop-shadow-lg focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Save</button>
            </div>
        </form>
    </div>
@endsection
