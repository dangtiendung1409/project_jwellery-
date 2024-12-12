<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'slug',
        'image',
        'parent_category_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function subcategories()
    {
        return $this->hasMany(Category::class,'parent_category_id','id');
    }
}

