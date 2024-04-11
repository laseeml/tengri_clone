<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
             'password' => bcrypt('12345'),
         ]);

         \App\Models\Category::factory()->create([
             'title' => 'News'
         ]);

        \App\Models\Category::factory()->create([
            'title' => 'Life'
        ]);
        \App\Models\Category::factory()->create([
            'title' => 'Edu'
        ]);
    }
}
