@extends('layout.template')
@section('content')
<div class=" flex p-4 rounded-lg mt-5 mb-36" >
    <div class="ml-20 flex flex-col">
        <span class="font-bold text-xl">Add review</span>
        <div class="flex gap-10">
            <div>
                @php
                $imgLink = str_replace('public','storage', $produk->gambar_produk);  
                @endphp
                <img class="w-48 mt-3" src="{{asset($imgLink)}}" alt="">
                <button type="button" class="text-white bg-green-500 hover:bg-blue-600 focus:ring-4 focus:ring-green-300 rounded-lg text-md font-bold px-5 py-2.5 mx-auto mt-7 ">Continue Shopping</button>
            </div>
            <div>
                <span class="text-lg font-semibold">{{$produk->nama_produk}}</span>
                <form action="{{ route('review-store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_customer" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                    <input type="hidden" name="id_order_detail" value="{{ $order_detail->id }}">
                    <div class="rating-box my-3 items-center">
                        <div class="stars gap-[10px] flex">
                                <i class="fa-solid fa-star" onclick="changeRating(1)">
                                </i>
                                <i class="fa-solid fa-star" onclick="changeRating(2)">
                                </i>
                                <i class="fa-solid fa-star" onclick="changeRating(3)">
                                </i>
                                <i class="fa-solid fa-star" onclick="changeRating(4)">
                                </i>
                                <i class="fa-solid fa-star" onclick="changeRating(5)">
                                </i>
                            <input type="hidden" name="rating" value="" id="rating-input" class="bintang">
                        </div>
                    </div>
                    <textarea id="message" rows="4" name="komentar" class="block p-2.5 resize-none text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 w-[15rem]" placeholder="Write your review..."></textarea>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-md font-bold px-5 py-2.5 mr-2 mt-7 ">Submit Review</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

<script>
    function changeRating(rating) {
        // Mengubah nilai (value) dalam input rating sesuai dengan bintang yang diklik
        document.getElementById('rating-input').value = rating;
    }
</script>

