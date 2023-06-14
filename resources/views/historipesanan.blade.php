@extends('layout.template')
@section('content')
<div class="mt-10 ml-32">
    <span class="font-bold text-2xl">Histori Pesanan</span>
        <div class="mt-5 relative overflow-x-auto sm:rounded-lg">
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
                    </tr>
                </thead>
                <tbody class="border border-black">
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-36 pl-1 pr-4 py-4">
                            <img src="{{asset('img/produk.png')}}" alt="Rengginang">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <div>Rengginang</div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <div>x2</div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            20.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            40.000
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class=" w-7/12 py-5 flex justify-end border-t-0 border border-black">
                <div class="px-10 my-auto font-bold">Total Pesanan</div>
                <div class="px-10 my-auto font-bold">40.000</div>
                <div class="px-10">
                    <span class="text-sm font-semibold">Pesanan sudah dibayar</span>
                </div>


            </div>
        </div>
        <div class="mt-5 relative overflow-x-auto sm:rounded-lg">
            <table class="w-7/12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs bg-gray-50 text-gray-700 uppercase dark:text-gray-400">
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
                    </tr>
                </thead>
                <tbody class="border border-black">
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-36 pl-1 pr-4 py-4">
                            <img src="{{asset('img/produk.png')}}" alt="Rengginang">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <div>Rengginang</div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <div>x1</div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            20.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            20.000
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-32 pl-1 pr-4 py-4">
                            <img src="{{asset('img/produk.png')}}" alt="Rengginang">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <div>Rengginang</div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <div>x2</div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            20.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            40.000
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mb-10 w-7/12 flex justify-end border-t-0 border border-black">
                <div class="px-6 my-auto font-bold">Total Pesanan</div>
                <div class="px-6 my-auto font-bold">60.000</div>
                <div class="pl-6 pr-2">
                    <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 my-5 mr-2">Bayar Sekarang</button>
                </div>
            </div>
        </div>
</div>
@endsection
