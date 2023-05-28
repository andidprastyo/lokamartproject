@extends('layout.template')
@section('content')
<div class="flex justify-between pt-10 pb-10 drop-shadow-lg pl-32 bg-blue-100">
    <div class="flex flex-col " aria-label="Breadcrumb">
        <h1 class="text-2xl font-bold">Owner UMKM</h1>
        <ol class="inline-flex items-center ">
        <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            Home
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400">Owner UMKM</span>
            </div>
        </li>
        </ol>
        <h4 class="w-[27rem] mt-2">
            Are you an UMKM owner looking to boost your sales and expand your customer base? Look no further! Join the incredible world of online shopping and witness your business soar to new heights!
        </h4>
        <button type="button" class="mt-7 w-40 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg font-bold text-md px-5 py-2.5 mr-2 mb-2 ">Let's Join Now</button>
    </div>
    <div class="mr-10 flex gap-[2rem]">
        <img class="w-48 h-52" src="{{asset('img/owner1.png')}}" alt="">
        <img class="w-48 h-52" src="{{asset('img/owner2.png')}}" alt="">
    </div>
</div>
<div class="mt-20 mb-10 mx-auto text-center">
    <h1 class="text-2xl font-bold">Our Owner UMKM</h1>
    <h1 class="text-xl font-medium">Hi, this is our Owner UMK</h1>
</div>
<div class="grid mb-32 grid-cols-4 gap-[5rem] mx-auto">
    <img class="w-48 h-[275px]" src="{{asset('img/owner/1.png')}}" alt="">
    <img class="w-48 h-[275px]" src="{{asset('img/owner/2.png')}}" alt="">
    <img class="w-48 h-[275px]" src="{{asset('img/owner/3.png')}}" alt="">
    <img class="w-48 h-[275px]" src="{{asset('img/owner/4.png')}}" alt="">
    <img class="w-48 h-[275px]" src="{{asset('img/owner/5.png')}}" alt="">
    <img class="w-48 h-[275px]" src="{{asset('img/owner/6.png')}}" alt="">
    <img class="w-48 h-[275px]" src="{{asset('img/owner/7.png')}}" alt="">
    <img class="w-48 h-[275px]" src="{{asset('img/owner/8.png')}}" alt="">
</div>
@endsection
