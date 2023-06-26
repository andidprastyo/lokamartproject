@extends('layout.template')
@section('content')
    <div class="mt-20 ml-20 flex flex-col">
        @if(empty($pesanan))
        <div class="mx-auto flex flex-col text-center my-20">
            <span class="text-3xl font-bold"> Your Cart is <span class="text-amber-400">Empty</span></span>
            <span class="text-xl mt-2">Go to shop and add your product</span>
            <a href="{{ route('home') }}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-10 mb-28 w-[10rem] mx-auto ">Back to Shop</button></a>
        </div>
        @endif
        @if(!empty($pesanan))
        <span class="text-3xl mb-3 font-bold">Shopping Cart</span>
            <span class="mb-5">There are <span class="text-green-500">{{ count($detail_pesanan) }} Product </span>in your
                cart</span>
            <div class="flex mb-8">
                <div class="flex flex-col">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="relative w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Product
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class=" px-14 py-3">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($detail_pesanan as $dp)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-1" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="w-32 p-4">
                                            @php
                                                $imgLink = str_replace('public', 'storage', $dp->produk->gambar_produk);
                                                
                                            @endphp
                                            <img src="{{ asset($imgLink) }}" alt="">
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            <div class="flex flex-col">
                                                <span class="text-lg ">{{ $dp->produk->nama_produk }}</span>
                                                <span class="text-xs ">Owner:
                                                    {{ $owner[$loop->iteration - 1]->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            @currency($dp->produk->harga_produk)
                                        </td>
                                        <input type="hidden" id="price{{ $dp->id }}" value="{{$dp->produk->harga_produk}}">

                                        {{-- input qty start --}}

                                        <td class="px-6 py-4" style="padding-left: 56px">
                                            <div class="flex items-center space-x-3" id="quantity">
                                                <div>
                                                    <input type="number" id="qtyInput{{ $dp->id }}"
                                                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="1" required min="1" max="{{$dp->produk->stok_produk}}"
                                                        onchange="changeQty ({{ $dp->id }})">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white subtotal" id="showsubtotal{{ $dp->id }}">
                                            @currency($dp->subtotal)
                                        </td>
                                        <input type="hidden" name="" id="subtotal{{ $dp->id }}" value="{{$dp->subtotal}}">
                                        <input type="hidden" name="" id="subtotinput{{$dp->id}}">


                                        {{-- input qty end --}}

                                        <td class="px-6 py-4">
                                            <form action="{{ route('order.destroy', $dp->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex mb-8">
                <div class="flex flex-col w-[52rem]">
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        {{-- input hidden --}}
                        @foreach ($detail_pesanan as $dp)  
                        <input type="hidden" name="qty{{$dp->id}}" id="qtyHidden{{$dp->id}}" value="">
                        @endforeach
                        <span class="font-bold text-md">Shipping Details</span>
                        <div class="grid gap-3 mb-5 md:grid-cols-2">
                            <div>
                                <label for="nama"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Nama
                                    Penerima</label>
                                <input type="text" id="nama" name="nama_penerima"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 w-full focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                            </div>
                            <div>
                                <label for="phone"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">No.Telp</label>
                                <input type="text" id="phone" name="notelp_penerima"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 w-full focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="123-45-678" required>
                            </div>
                        </div>
                        <div class="grid gap-3 mb-5 md:grid-cols-3">
                            <div>
                                <label for="provinsi"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 w-full focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Jawa Timur" required>
                            </div>
                            <div>
                                <label for="Kota"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Kota</label>
                                <input type="text" id="kota" name="kota"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 w-full focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Kota Malang" required>
                            </div>
                            <div>
                                <label for="Kecamatan"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Kecamatan</label>
                                <input type="text" id="kecamatan" name="kecamatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 w-full focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Lowokwaru" required>
                            </div>
                            <div>
                                <label for="Kecamatan"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Kelurahan</label>
                                <input type="text" id="kelurahan" name="kelurahan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 w-full focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Jatimulyo" required>
                            </div>
                        </div>
                        <div class="grid gap-3 mb-7 md:grid-cols-2">
                            <div>
                                <label for="alamat"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Alamat
                                    Lengkap</label>
                                <textarea id="alamat" rows="4" name="detail_alamat"
                                    class="block p-2.5 resize-none text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 w-full"
                                    placeholder="Jl. Soekarno Hatta no 2"></textarea>
                            </div>
                            <div>
                                <label for="catatan"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Catatan</label>
                                <textarea id="message" rows="4" name="catatan_order"
                                    class="block p-2.5 resize-none text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 w-full"
                                    placeholder="Catatan ..."></textarea>
                            </div>
                        </div>
                        <span class="font-bold text-md">Payment Information</span>
                        <div class="flex text-sm mb-20">
                            <div class="flex-col w-8 mr-20">
                                <div class="text-center text-2xl">
                                    {{ count($detail_pesanan) }}
                                </div>
                                <div>
                                    items
                                </div>
                            </div>
                            <div class="flex-col w-fit mr-20">
                                <div class="text-center text-green-500 text-2xl" id="sum-tot">
                                    @currency($pesanan->total)
                                </div>
                                <div>
                                    Total Pembayaran
                                </div>
                            </div>
                            <button type="submit"
                                class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm w-fit px-5 py-3 mr-10 mb-2">Checkout</button>

                            <button></button>
                    </form>
                    <a href="{{ route('home') }}"><button type="button"
                            class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm w-fit px-5 py-3 mr-2 mb-2">Continue
                            Shopping</button></a>
                </div>
            </div>
    </div>
    @endif
</div>

<script>
    function changeQty(id) {

        let qtyinput = document.getElementById(`qtyInput${id}`).value
        let showsubtotal = document.getElementById(`showsubtotal${id}`)
        let subtotal = document.getElementById(`subtotal${id}`)
        let price = document.getElementById(`price${id}`).value
        let subtotinput = document.getElementById(`subtotinput${id}`)
        let sum_tot = document.getElementById(`sum-tot`)
        var hiddenInput = document.getElementById(`qtyHidden${id}`);

        let formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        });
        
        console.log(hiddenInput);
        hiddenInput.value = qtyinput;

        console.log(price);
        subtotal = qtyinput * price;
        console.log(subtotal);
        showsubtotal.innerHTML = formatter.format(subtotal);
        subtotinput.value = subtotal
        // subtotal.innerHTML = formatter.format(subtotal.innerHTML)
        
        let total_all = document.querySelectorAll('.subtotal');
        console.log(total_all);
        let subtotalValues = [];

        total_all.forEach(element => {
        let subtotalValue = parseFloat(element.innerHTML.replace(/[^\d]/g, ''));
        subtotalValues.push(subtotalValue / 100);
        });

        console.log(subtotalValues);
        let totalSum = subtotalValues.reduce((total, each) => total + each);
        sum_tot.innerHTML = formatter.format(totalSum);
        // let total_all = unformattedSubtotal
        
        // total_all = [...total_all]
        
        // total_all = total_all.map(element => parseFloat(element.innerHTML))

        // total_all = total_all.reduce((total, each) => total + each)
        // console.log(total_all)
        // sum_tot.innerHTML = total_all
    }
</script>

@endsection

{{-- <script>
    // jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    $.('#quantity').each(function() {
        var spinner = $.(this),
        input = $.('#first_product'),
        btnUp = $.('#buttonUp'),
        btnDown = $.('#buttonDown'),
        min = input.attr('min'),
        max = input.attr('max');
        
      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("#first_product").val(newVal);
        spinner.find("#first_product").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("#first_product").val(newVal);
        spinner.find("#first_product").trigger("change");
      });

    });
</script> --}}
