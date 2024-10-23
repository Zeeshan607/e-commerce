<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            [
            "id"=>1,
            "name"=>"Mobile",
            "slug"=>"mobile",
            "image"=>"mobile.webp",
            "description"=>"Category containing all type of Mobile phones",
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ],
            [
                "id"=>2,
                "name"=>"Vivo",
                "slug"=>"vivo",
                "image"=>"mobile.webp",
                "description"=>"Category containing mobile phones of Vivo brand",
//                "parent_id"=>1,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now(),
            ]

        ]);
    }
}
