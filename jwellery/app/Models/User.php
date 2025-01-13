<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /*
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'thumbnail',
        'phone_number',
        'province',
        'district',
        'ward',
        'address_detail',
        'password',
        'account_balance',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getFullAddressAttribute()
    {
        return "{$this->province}, {$this->district}, {$this->ward}, {$this->address_detail}";
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }
}
