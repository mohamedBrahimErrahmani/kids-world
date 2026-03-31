<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PlayType;
use Illuminate\Support\Str;

class PlayTypeSeeder extends Seeder
{
    public function run(): void
    {
        $playTypes = [
            ['name' => 'Educational', 'icon' => 'school'],
            ['name' => 'Fun & Games', 'icon' => 'celebration'],
            ['name' => 'Outdoor', 'icon' => 'forest'],
        ];

        foreach ($playTypes as $type) {
            PlayType::create([
                'name' => $type['name'],
                'slug' => Str::slug($type['name']),
                'icon' => $type['icon'],
            ]);
        }
    }
}
