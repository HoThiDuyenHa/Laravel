<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class categories2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories2')->insert([
            ['name' => 'Clothing', 'description' => 'Men and women fashion'],
            ['name' => 'Books', 'description' => 'Educational and entertainment books'],
            ['name' => 'Furniture', 'description' => 'Home and office furniture'],
        ]);
}
}