<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Creator;
use App\Models\TiktokVideo;
use App\Models\Product;

class PartnerReferralSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks for truncation
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Creator::truncate();
        TiktokVideo::truncate();
        \Illuminate\Support\Facades\DB::table('product_tiktok_video')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $creators = [
            ['name' => 'Marcus Chen', 'handle' => '@marcus.c', 'platform' => 'tiktok', 'avatar_url' => 'https://ui-avatars.com/api/?name=Marcus+Chen'],
            ['name' => 'Elena Rodriguez', 'handle' => '@elena.r', 'platform' => 'tiktok', 'avatar_url' => 'https://ui-avatars.com/api/?name=Elena+Rodriguez'],
            ['name' => 'Julian Vose', 'handle' => '@julian.v', 'platform' => 'instagram', 'avatar_url' => 'https://ui-avatars.com/api/?name=Julian+Vose'],
            ['name' => 'Aisha Khan', 'handle' => '@aisha.k', 'platform' => 'tiktok', 'avatar_url' => 'https://ui-avatars.com/api/?name=Aisha+Khan'],
        ];

        foreach ($creators as $cData) {
            $creator = Creator::create($cData);

            // Link to 1-2 random products
            $products = Product::inRandomOrder()->take(rand(1, 2))->get();
            foreach ($products as $product) {
                $video = TiktokVideo::create([
                    'creator_id' => $creator->id,
                    'title' => 'Viral Playroom Hack ' . rand(1, 100),
                    'tiktok_url' => 'tiktok.com/v/' . rand(100000, 999999),
                    'thumbnail_path' => 'https://images.unsplash.com/photo-1602030638412-bb4d9a8bf0c0?q=80&w=260&auto=format&fit=crop',
                    'views_count' => rand(100000, 2000000),
                    'clicks_count' => rand(5000, 50000),
                    'engagement_rate' => rand(30, 150) / 10,
                    'posted_at' => now()->subDays(rand(1, 30)),
                ]);
                $video->products()->attach($product->id);
            }
        }
    }
}
