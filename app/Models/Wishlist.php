<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public function wishlist_detail()
    {
        return $this->hasMany(Wishlist_detail::class);
    }
}
