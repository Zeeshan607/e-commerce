<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected  $fillable=[
        'name',
        'description',
        'sku',// stock keeping unit: A unique identifier for the product used for inventory management and tracking. It helps in differentiating products and their variations.
        'price',//sale price
        'sale_price',//if product is on sale
        'cost',// on which product is bought by store
        'stock',
        'category_id',
        'featured_image',
        'tags',
        'variants',
        'weight',
        'free_shipping',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'slug',

    ];


    public function images(){
        return $this->hasMany(ProductImages::class, 'product_id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name','id']
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
