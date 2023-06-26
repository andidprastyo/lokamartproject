@extends('layout.template')
@section('content')

<div class="flex mt-20 mx-auto gap-[5rem]">
    <div>
        @php
        $imgLink = str_replace('public','storage', $produk->gambar_produk);  
        @endphp
        <img class="w-[362px] h-[332px]" src="{{asset($imgLink)}}" alt="">
    </div>
    <div class="justify-start">
        <div class="flex gap-[12rem]">
            <span class="text-2xl font-bold">{{ $produk->nama_produk }}</span>
            <button><img src="{{asset('img/heart.svg')}}" alt=""></button>
        </div>
        <div class="flex mt-3 mb-3">
            {{ $rating }}
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        </div>
        <div class="mb-3">
            <span class="font-semibold text-lg">Stok: {{ $produk->stok_produk }}</span>
        </div>
        <div class="mb-3">
            <span class="font-semibold text-lg">Price</span>
        </div>
        <div>
            <span class="font-bold text-2xl">@currency($produk->harga_produk)</span>
        </div>
        <div class="w-[23rem]">
            <p class="text-justify">{{ $produk->desk_produk }}</p>
        </div>
        <div class="flex gap-3 mt-3">
            <a href="#" class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add to cart</a>
            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add to wishlist</a>
        </div>
    </div>
</div>
<div class="mt-40 mb-20 w-[50rem] mx-auto border">
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-lg  text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block font-semibold p-4 border-b-2 rounded-t-lg" id="description" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Review</button>
            </li>
        </ul>
    </div>
    <div id="myTabContent">
        <div class="hidden py-6 pl-4 pr-[8rem] rounded-lg" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="flex flex-col w-[27rem]">
                <span class=" mb-1 font-bold text-lg">Customer Review</span>
                @foreach($review as $r)
                <span class="mb-2 text-xl">{{ $r->produk->user->name }}</span>
                <span class="text-md font-medium">{{ $r->created_at }}</span>
                <div class="flex mt-2 mb-2">
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> {{ $r->rating}}
                </div>
                <p class="text-justify">{{ $r->komentar }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
