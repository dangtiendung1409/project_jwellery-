<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_date',
        'total_amount',
        'status',
        'is_paid',
        'province',
        'district',
        'ward',
        'address_detail',
        'full_name',
        'email',
        'telephone',
        'payment_method',
        'shipping_method',
        'cancel_reason',
        'order_code',
        'secure_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

