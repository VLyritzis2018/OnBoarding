<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Jette Louise',
            'email' => 'jettelouises@gmail.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Bashar Muhanna',
            'email' => 'basharalshaibani12@gmail.com',
        ]);
    }
}
