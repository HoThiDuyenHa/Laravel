<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class product3 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i <=100; $i++) {
            DB::table('product3')->insert([
                'name' => $faker->unique()->word(),
                'price' => $faker->numberBetween(100000, 5000000),
                'image' => $faker->imageUrl(200, 200, 'fashion', true),
                'cate_id' => $faker->numberBetween(1, 3), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
