@extends('layout.template')
@section('content')
    <div class="my-20 mx-24 w-96">
        <h1 class="text-3xl font-bold">Add your product</h1>
        <span class="mt-3">Complate Your Detail Information Product</p>
            <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_kategori" value="1">
                <input type="hidden" name="id_owner" value="{{ auth()->user()->id }}">
                <div class="flex flex-col gap-3 mt-3 appearance-none">
                    <input type="text" id="nama_produk"
                        class="bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 form-control @error('nama_produk') is-invalid @enderror"
                        name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Nama Produk" required autofocus>
                    <div class="relative">
                        <select
                            class="appearance-none w-96 bg-white border border-blue-300 hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                            name="kategori" id="kategori">
                            <option value="" >Pilih Kategori</option>
                            {{-- Default --}}
                            @foreach ($kategori as $ktr)
                            <option value="{{ $ktr->id }}">{{ $ktr->nama_kategori }}</option>
                	        @endforeach

                        </select>
                    </div>
                    <input type="number" id="stok_produk"
                        class=" bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 appearance-none form-control @error('stok_produk') is-invalid @enderror"
                        name="stok_produk" value="{{ old('stok_produk') }}" placeholder="Stok" required autofocus>
                    <input type="number" id="harga_produk"
                        class=" bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 appearance-none form-control @error('harga_produk') is-invalid @enderror"
                        name="harga_produk" value="{{ old('harga_produk') }}" placeholder="Harga" required autofocus>
                    <textarea id="message" rows="4"
                        class="bg-gray-50 border border-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 resize-noneform-control @error('desk_produk') is-invalid @enderror"
                        name="desk_produk" placeholder="Deskripsi produk"></textarea>
                    <input
                        class="block w-full text-sm text-gray-900 border border-blue-300 rounded-lg cursor-pointer bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        aria-describedby="user_avatar_help" id="user_avatar" type="file" name="image">
                </div>
                <div class="flex justify-between mt-5">
                    <button type="button"
                        class="drop-shadow-lg focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Reset</button>
                    <button type="button"
                        class="drop-shadow-lg text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Back
                        to Homepage</button>
                    <button type="submit"
                        class="drop-shadow-lg focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 ">Save</button>
                </div>
            </form>
    </div>
@endsection
