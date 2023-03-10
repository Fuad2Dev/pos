<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(4)->has(Attribute::factory()->count(3))->create();
    }
}
