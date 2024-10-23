<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
              'id' => 1,
              'name'=>"Vivo y30",
              "slug"=>"vivo-y30",
              "sku"=>"Vivo-vi-y30",
              "description"=>"Vivo y30, 4gb-Ram, 64gb-Storage,  ",
              "cost"=>"500",
              "price"=>"1000",
              "category_id"=>2,
                "featured_image"=>"placeholderImage.webp"
            ],
            [
                'id' => 2,
                'name'=>"Vivo y73",
                "slug"=>"vivo-y73",
                "sku"=>"Vivo-vi-y73",
                "description"=>"Vivo y73, 4gb-Ram, 64gb-Storage,  ",
                "cost"=>"500",
                "price"=>"1000",
                "category_id"=>2,
                "featured_image"=>"placeholderImage.webp"
            ]
        ]);



    }
}
