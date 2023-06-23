<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Produk;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    public function produk(){
        return $this->hasMany(Produk::class,'id','id_kategori');
    }
}
