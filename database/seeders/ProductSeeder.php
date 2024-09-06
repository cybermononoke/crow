<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Crow T-shirt',
                'description' => 'Soft cotton t-shirt with a crow logo.',
                'price' => 20.00,
            ],
            [
                'name' => 'Crow Mug',
                'description' => 'Ceramic mug with a crow print.',
                'price' => 10.00,
            ],
            [
                'name' => 'Crow Hoodie',
                'description' => 'Comfortable hoodie with a crow design.',
                'price' => 35.00,
            ],
            [
                'name' => 'Crow Cap',
                'description' => 'Black cap with an embroidered crow logo.',
                'price' => 15.00,
            ],
            [
                'name' => 'Crow Food',
                'description' => 'Food for your crow friend. Cruelty-free sunfloewr seeds.',
                'price' => 2.00,
            ],
        ]);
    }
}
