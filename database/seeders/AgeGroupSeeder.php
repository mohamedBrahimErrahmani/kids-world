<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\AgeGroup;
use Illuminate\Support\Str;

class AgeGroupSeeder extends Seeder
{
    public function run(): void
    {
        $ageGroups = [
            ['name' => '0-1 Years', 'min_age' => 0, 'max_age' => 1],
            ['name' => '2-3 Years', 'min_age' => 2, 'max_age' => 3],
            ['name' => '4-6 Years', 'min_age' => 4, 'max_age' => 6],
            ['name' => '7+ Years', 'min_age' => 7, 'max_age' => null],
        ];

        foreach ($ageGroups as $group) {
            AgeGroup::create([
                'name' => $group['name'],
                'slug' => Str::slug($group['name']),
                'min_age' => $group['min_age'],
                'max_age' => $group['max_age'],
            ]);
        }
    }
}
