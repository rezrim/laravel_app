<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'slug',
        'meta_description',
        'meta_title',
        'product_name',
        'product_image',
        'product_description',
        'stock',
        'price',
        'view',
        'active'
    ];

    public function product_category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
