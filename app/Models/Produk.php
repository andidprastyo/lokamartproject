<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $guarded = ['nama'];
    protected $with = ['user'];
    public function order_detail()
    {
        return $this->hasMany(Order_detail::class, 'id', 'produk_id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_owner','id');
    }

    public function review(){
        return $this->hasMany(Review::class,'id', 'id_produk');
    }

    public function wishlist_detail()
    {
        return $this->hasMany(Wishlist_detail::class);
    }
}
