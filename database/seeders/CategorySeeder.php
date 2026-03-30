<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Toys',
                'description' => 'Developmental & Sustainable Play',
                'icon' => 'rocket_launch',
            ],
            [
                'name' => 'Baby Care',
                'description' => 'Organic & Safe Essentials',
                'icon' => 'child_care',
            ],
            [
                'name' => 'Clothing',
                'description' => 'Eco-Conscious Fashion',
                'icon' => 'checkroom',
            ],
            [
                'name' => 'School Items',
                'description' => 'Gear for Modern Learners',
                'icon' => 'school',
            ],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'description' => $cat['description'],
                'icon' => $cat['icon'],
            ]);
        }
    }
}
