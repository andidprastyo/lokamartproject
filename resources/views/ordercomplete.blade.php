@extends('layout.template')
@section('content')
    <div class="flex mb-32 mx-[22.5rem] justify-between">
        <div class="flex flex-col mt-24">
            <span class="text-4xl font-bold">Your Order</span>
            <span class="text-4xl mt-2 font-bold text-green-400">Is Completed</span>
            <span class="text-xl mt-4">Thank you for your order</span>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-10 w-[10rem] ">Back to Shop</button>
        </div>
        <img class="mt-16 w-[388px] h-[275px]" src="{{asset('img/complete.png')}}" alt="">
    </div>
@endsection
