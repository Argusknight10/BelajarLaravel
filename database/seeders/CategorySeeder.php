<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(5)->create(),
        Category::create([
            'name' => 'Hiburan',
            'slug' => 'hiburan',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Politik',
            'slug' => 'politik',
            'color' => 'red'
        ]);
        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'color' => 'yellow'
        ]);
        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
            'color' => 'green'
        ]);
        Category::create([
            'name' => 'Sedang hangat',
            'slug' => 'sedang-hangat',
            'color' => 'orange'
        ]);
    }
}
