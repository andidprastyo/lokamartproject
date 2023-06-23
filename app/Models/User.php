<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Maize\Markable\Markable;
use Maize\Markable\Models\Favorite;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Markable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $marks = [
        Favorite::class,
    ];

    public function produk(){
        return $this->hasMany(Produk::class,'id','id_owner');
    }

    public function review(){
        return $this->hasMany(Review::class,'id','id_customer');
    }

    public function toSearchableArray()
    {
        return [
            'nama' => $this->nama,
            'email' => $this->email,
        ];
    }
}
