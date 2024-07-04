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
        'sku',// stock keeping unit: A unique identifier for the product used for inventory management and tracking. It helps in differentiating products and their variations.
        'price',//sale price
        'sale_price',//if product is on sale
        'cost',// on which product is bought by store
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
