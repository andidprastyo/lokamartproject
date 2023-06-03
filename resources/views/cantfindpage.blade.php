@extends('layout.template')
@section('content')
    <div class="flex mb-32 mx-[22.5rem] justify-between">
        <div class="flex flex-col mt-24">
            <span class="text-4xl font-bold">We Cannot</span>
            <span class="text-4xl mt-2 font-bold text-red-600">Find This Page</span>
            <span class="text-xl mt-4">Oops, This page was deleted</span>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-10 w-[11rem] ">Back to Homepage</button>
        </div>
        <img class="mt-16 w-[388px] h-[275px]" src="{{asset('img/cantfind.png')}}" alt="">
    </div>
@endsection
