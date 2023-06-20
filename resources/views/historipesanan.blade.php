@extends('layout.template')
@section('content')
    <div class="mt-10 ml-32">
        <span class="font-bold text-2xl">Histori Pesanan</span>
        <div class="mt-5 relative overflow-x-auto sm:rounded-lg">
            @foreach ($pesanan as $p)
                <table class="w-7/12 text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs bg-gray-50  text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="pl-1 pr-6 py-3">
                                Product Detail
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border border-black">
                        @foreach ($detail_pesanan as $dp)
                            @if ($dp->order_id == $p->id)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-36 pl-1 pr-4 py-4">
                                        @php
                                            $imgLink = str_replace('public', 'storage', $dp->produk->gambar_produk);
                                            
                                        @endphp
                                        <img src="{{ asset($imgLink) }}" alt="">
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        <div>{{ $dp->produk->nama_produk }}</div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        <div>{{ $dp->qty }}</div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        {{ $dp->produk->harga_produk }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        {{ $dp->subtotal }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        <a href="/review/create/{{ $dp->produk_id }}">
                                            <button type="button"
                                                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 my-5 mr-2">Review</button>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <div class=" w-7/12 py-5 flex justify-end border-t-0 border border-black">
                    <div class="px-10 my-auto font-bold">Total Pesanan</div>
                    <div class="px-10 my-auto font-bold">{{ $p->total }}</div>
                    <div class="pl-6 pr-2">
                        <button id="pay-button{{ $p->id }}" type="button"
                            class="text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 my-5 mr-2">Checkout</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@foreach ($pesanan as $p)
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton{{ $p->id }} = document.getElementById('pay-button{{ $p->id }}');
    payButton{{ $p->id }}.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        console.log('clickeds');
        window.snap.pay('{{ $p->token }}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                // alert("payment success!");
                window.location.href = '/pesanan'
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });

    // function onCheckOut(){
        
    // }
</script>
@endforeach
