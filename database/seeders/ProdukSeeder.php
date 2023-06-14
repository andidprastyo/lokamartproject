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
        	['id_owner' => 2,
            'id_kategori' => 1,
            'nama_produk' => 'Rengginang',
        	'desk_produk' => 'lorem ipsum dolor sit amet, consectetur adipis',
            'gambar_produk' => 'rengginang.jpe',
            'stok_produk' => 10,
        	'harga_produk' => 20000,
            'slug' => "rengginang"
        	],
        ]);
    }
}
