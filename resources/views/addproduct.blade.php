@extends('layout.template')
@section('content')
    <div class="my-20 mx-24 w-96">
        <h1 class="text-3xl font-bold">Add your product</h1>
        <span class="mt-3">Complate Your Detail Information Product</p>
        <form action="">
            <div class="flex flex-col gap-3 mt-3 appearance-none">
                <input type="text" id="name"
                    class="bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Product Name" required>
                <input type="number" id="stock"
                    class=" bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 appearance-none"
                    placeholder="Stock" required>
                <input type="number" id="price"
                    class=" bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 appearance-none"
                    placeholder="Price" required>
                <textarea id="message" rows="4" class="bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 resize-none" placeholder="Product Description"></textarea>
                <input class="block w-full text-sm text-gray-900 border border-blue-300 rounded-lg cursor-pointer bg-gray-50 focus:ring-blue-500 focus:border-blue-500" aria-describedby="user_avatar_help" id="user_avatar" type="file">
            </div>
            <div class="flex justify-between mt-5">
                <button type="button" class="drop-shadow-lg focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Reset</button>
                <button type="button" class="drop-shadow-lg text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Back to Homepage</button>
                <button type="button" class="drop-shadow-lg focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 ">Save</button>
            </div>
        </form>
    </div>
@endsection
