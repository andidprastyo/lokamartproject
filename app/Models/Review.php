<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\User;

class Review extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $with = ['produk'];
    protected $table = 'review';

    protected $fillable = [
            'id_customer',
            'id_produk',
            'rating',
            'komentar',
            'id_order_detail',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_customer', 'id');
    }

    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

    public function order_detail(){
        return $this->belongsTo(Order_detail::class, 'id_order_detail', 'id');
    }


}
