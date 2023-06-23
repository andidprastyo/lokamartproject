<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'id_owner' => 3,
                'id_kategori' => 1,
                'nama_produk' => 'Rengginang',
                'desk_produk' => 'lorem ipsum dolor sit amet, consectetur adipis',
                'gambar_produk' => 'public/img/produk/produk.png',
                'stok_produk' => 10,
                'harga_produk' => 20000,
                'slug' => "rengginang"
            ],
            [
                'id_owner' => 4,
                'id_kategori' => 2,
                'nama_produk' => 'Vinut Orange Milk',
                'desk_produk' => 'lorem ipsum dolor sit amet, consectetur adipis',
                'gambar_produk' => 'public/img/produk/vinut_orange_milk.jpeg',
                'stok_produk' => 40,
                'harga_produk' => 7000,
                'slug' => "vinut-orange-milk"
            ],
            [
                'id_owner' => 5,
                'id_kategori' => 2,
                'nama_produk' => 'Vinut Soya Milk',
                'desk_produk' => 'lorem ipsum dolor sit amet, consectetur adipis',
                'gambar_produk' => 'public/img/produk/vinut_soya_milk.jpeg',
                'stok_produk' => 40,
                'harga_produk' => 7000,
                'slug' => "vinut-soya-milk"
            ],
            [
                'id_owner' => 5,
                'id_kategori' => 2,
                'nama_produk' => 'Vinut Manggo Juice',
                'desk_produk' => 'lorem ipsum dolor sit amet, consectetur adipis',
                'gambar_produk' => 'public/img/produk/vinut_mango_juice.jpeg',
                'stok_produk' => 30,
                'harga_produk' => 7500,
                'slug' => "vinut-manggo-juice"
            ],
            [
                'id_owner' => 4,
                'id_kategori' => 2,
                'nama_produk' => 'Taiwan Mango Milk',
                'desk_produk' => 'lorem ipsum dolor sit amet, consectetur adipis',
                'gambar_produk' => 'public/img/produk/taiwan_mango_milk.jpeg',
                'stok_produk' => 35,
                'harga_produk' => 8500,
                'slug' => "taiwan-mango-milk"
            ],
            [
                'id_owner' => 3,
                'id_kategori' => 2,
                'nama_produk' => 'Vinut Coco Mango Milk',
                'desk_produk' => 'lorem ipsum dolor sit amet, consectetur adipis',
                'gambar_produk' => 'public/img/produk/vinut_coco_mango_milk.jpeg',
                'stok_produk' => 30,
                'harga_produk' => 8000,
                'slug' => "vinut-coco-mango-milk"
            ],
            [
                'id_owner' => 3,
                'id_kategori' => 1,
                'nama_produk' => 'Mamiko Abon Spesial',
                'desk_produk' => 'Abon spesial dengan bahan-bahan premium',
                'gambar_produk' => 'public/img/produk/mamiko.jpeg',
                'stok_produk' => 99,
                'harga_produk' => 50000,
                'slug' => "mamiko-abon-spesial"
            ],
            [
                'id_owner' => 4,
                'id_kategori' => 1,
                'nama_produk' => 'Meytoz Corn Chips',
                'desk_produk' => 'Camilan kekinian dengan berbagai varian rasa dan tingkat kepedasan',
                'gambar_produk' => 'public/img/produk/meytoz.jpeg',
                'stok_produk' => 99,
                'harga_produk' => 25000,
                'slug' => "meytoz-corn-chips"
            ],
            [
                'id_owner' => 5,
                'id_kategori' => 1,
                'nama_produk' => 'Waffle Mill Waffle Chips',
                'desk_produk' => 'keripik waffle dengan taburan coklat dan seasalt',
                'gambar_produk' => 'public/img/produk/wafflechips.jpeg',
                'stok_produk' => 99,
                'harga_produk' => 35000,
                'slug' => "waffle-mill-waffle-chips"
            ],
        ]);
    }
}
