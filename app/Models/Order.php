<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    // protected $fillable = ['nama']
    // untuk mengatasi error fillable bisa digantikan dengan guarded
    protected $guarded = [];

    public function order_detail(){
        return $this->hasMany(Order_detail::class);
    }
}
