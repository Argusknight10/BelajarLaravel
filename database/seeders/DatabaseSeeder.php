<?php

namespace Database\Seeders;

use App\Models\Blog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // // Cara seperti menggunakan php artisan tinker
        // Blog::factory(100)->recycle([
        //     Category::factory(5)->create(),
        //     User::factory(10)->create()
        // ])->create();

        // // Cara jika memisahkan seeder-nya satu per satu
        $this->call([CategorySeeder::class, UserSeeder::class]);
        Blog::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
