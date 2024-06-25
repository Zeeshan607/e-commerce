<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $fillable=[
         'name',
        'description',
        'sku',
        'price',
        'sale_price',
        'cost',
        'quantity',
        'category_id',
        'subcategory_id',
        'tags',
        'images',
        'videos',
        'attributes',
        'variants',
        'weight',
        'dimensions',
        'free_shipping',
        'brand_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'slug',
        'related_products'
    ];
}
