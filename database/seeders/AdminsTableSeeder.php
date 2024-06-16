<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('admins')->insert([
            'name' => 'Admin001',
            'email' => 'admin@ecommerce.com',
            'role'=> 'super_admin',
            'password' => Hash::make('Ecommerce-2024'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
                ]);
    }
}
