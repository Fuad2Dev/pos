<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Attribute;
use App\Models\Config;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Database\Factories\AttributeFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->admin()->create();

        // $sale = Sale::factory()->create();

        // \App\Models\Product::factory()
        //     ->has(
        //         \App\Models\Attribute::factory(5)
        //             ->state(new Sequence(
        //                 ['sale_id' => $sale->id],
        //                 ['sale_id' => null],
        //             ))
        //     )
        //     ->create();

        Attribute::factory()->for(Product::factory())->for(Sale::factory())->create();

        // DB::table('attributes')->truncate();
        // DB::table('products')->truncate();

        Config::create([
            'name' => 'Fuad\'s Collections',
            'logo' => 'logo/VyMot8f+2R36U01eEb3hMx7170U00SPGmLJDMTrEK.jpg'
        ]);
    }
}
