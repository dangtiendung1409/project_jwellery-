<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnImage extends Model
{
    use HasFactory;

    protected $fillable = ['order_return_id', 'image_path'];

    public function productReturn()
    {
        return $this->belongsTo(ProductReturn::class);
    }
}

