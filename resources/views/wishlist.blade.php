@extends('layout.template')
@section('content')
<div class="mx-auto my-[5rem] grid grid-cols-4 gap-[5rem]">
    @if(!empty($products))
    @foreach ($products as $p)
    <div class="w-[15rem] drop-shadow-lg max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{ route('produk', ['slug' => $p->slug]) }}" id="imgCard">
            @php
                $imgLink = str_replace('public','storage',$p->gambar_produk,);
                
            @endphp
            <img class="rounded-t-lg" src="{{asset($imgLink)}}" alt="" />
        </a>
        <div class="px-5 mt-3 pb-5 text-center">
            <a href="#">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$p->nama_produk}}</h5>
            </a>
            {{-- {{ $rating }} --}}
            <div class="flex justify-center mt-3 mb-3">
                <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            </div>
            <div class="items-center">
                <span class="text-3xl font-bold text-gray-900 dark:text-white">{{$p->harga_produk}}</span>
            </div>
            <div class="flex flex-col gap-3 mt-3">
                <form method="POST" action="/pesan/{{$p->id}}">
                    @csrf
                    <button type="submit" class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-0">Add to Cart</button>
                </form>
                <form action="{{ route('favorite.remove',$p->id) }}" method="POST"
                    onsubmit="return confirm('{{ trans('are You Sure ? ') }}');"
                    style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="px-4 py-2 text-white bg-red-700 rounded"
                        value="Delete">
                </form>
            </div>

        </div>
    </div>
    </form>
    @endforeach
    @endif
</div>
<div class="mx-auto flex flex-col text-center my-20">
    <span class="text-3xl font-bold"> Your Wishlist is <span class="text-amber-400">Empty</span></span>
    <span class="text-xl mt-2">Go to shop and add your product</span>
    <a href="{{ route('home') }}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-10 mb-28 w-[10rem] mx-auto ">Back to Shop</button></a>
</div>
@endsection
