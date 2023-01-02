<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Config;
use Illuminate\Database\Seeder;
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

        \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'isAdmin' => true,
            'password' => Hash::make('123456789'),
        ]);

        Config::create([
            'name' => 'Fuad\'s Collections',
            'logo' => 'logo/VyMot8f2R36U01eEb3hMx7170U00SPGmLJDMTrEK.jpg'
        ]);
    }
}
