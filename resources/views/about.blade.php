@extends('layout.template')
@section('content')

<div class="flex flex-col pt-10 pb-16 drop-shadow-lg pl-56 bg-blue-100" aria-label="Breadcrumb">
    <h1 class="text-2xl font-bold">About us</h1>
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
        <span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400">About</span>
        </div>
    </li>
    </ol>
</div>
<div class="mt-20 mx-auto">
    <h1 class="text-2xl mb-5 text-center font-medium">Welcome to Lokamart</h1>
    <h2 class="w-[36rem]">An application called LokaMart is included in the MSME e-commerce application (Micro, Small and Medium Enterprises). This application allows MSMEs to sell their products online through digital platforms. The background of the MSME e-commerce application stems from the increasing number of internet users and shifts in consumer behavior which are increasingly inclined to buy products online. It creates
    opportunities for MSMEs to market their products more effectively and reach a wider market.</h2>
    <h1 class="mt-20 mb-10 text-2xl text-center font-medium">What We Provide?</h1>
</div>
<div class="grid grid-cols-3 mb-40 gap-[5rem] mx-auto">
    <div class="block max-w-sm p-6 w-[17rem] bg-green-500 border border-gray-200 drop-shadow-lg">
        <h5 class="mb-2 text-2xl text-center font-semibold tracking-tight">Best <span class="text-amber-400">Price & Offers</span></h5>
        <p class="font-normal text-center">There are many variations of passages of lorem ipmsum available, but the majority have suffered alteration in some form</p>
    </div>
    <div class="block max-w-sm p-6 w-[17rem] bg-green-500 border border-gray-200 drop-shadow-lg">
        <h5 class="mb-2 text-2xl text-center font-semibold tracking-tight">Best <span class="text-amber-400">Price & Offers</span></h5>
        <p class="font-normal text-center">There are many variations of passages of lorem ipmsum available, but the majority have suffered alteration in some form</p>
    </div>
    <div class="block max-w-sm p-6 w-[17rem] bg-green-500 border border-gray-200 drop-shadow-lg">
        <h5 class="mb-2 text-2xl text-center font-semibold tracking-tight">Best <span class="text-amber-400">Price & Offers</span></h5>
        <p class="font-normal text-center">There are many variations of passages of lorem ipmsum available, but the majority have suffered alteration in some form</p>
    </div>
    <div class="block max-w-sm p-6 w-[17rem] bg-green-500 border border-gray-200 drop-shadow-lg">
        <h5 class="mb-2 text-2xl text-center font-semibold tracking-tight">Best <span class="text-amber-400">Price & Offers</span></h5>
        <p class="font-normal text-center">There are many variations of passages of lorem ipmsum available, but the majority have suffered alteration in some form</p>
    </div>
    <div class="block max-w-sm p-6 w-[17rem] bg-green-500 border border-gray-200 drop-shadow-lg">
        <h5 class="mb-2 text-2xl text-center font-semibold tracking-tight">Best <span class="text-amber-400">Price & Offers</span></h5>
        <p class="font-normal text-center">There are many variations of passages of lorem ipmsum available, but the majority have suffered alteration in some form</p>
    </div>
    <div class="block max-w-sm p-6 w-[17rem] bg-green-500 border border-gray-200 drop-shadow-lg">
        <h5 class="mb-2 text-2xl text-center font-semibold tracking-tight">Best <span class="text-amber-400">Price & Offers</span></h5>
        <p class="font-normal text-center">There are many variations of passages of lorem ipmsum available, but the majority have suffered alteration in some form</p>
    </div>

</div>
@endsection
