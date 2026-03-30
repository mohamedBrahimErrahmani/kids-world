<?php

namespace Database\Seeders;

use App\Models\TrafficLog;
use App\Models\ProductAnalytics;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AnalyticsSeeder extends Seeder
{
    public function run(): void
    {
        // Mock Traffic
        for ($i = 0; $i < 50; $i++) {
            TrafficLog::create([
                'ip_address' => '127.0.0.1',
                'page_url' => '/',
                'device_type' => $i % 2 == 0 ? 'desktop' : 'mobile',
            ]);
        }

        // Mock Product Analytics
        $products = Product::all();
        foreach ($products as $product) {
            ProductAnalytics::create([
                'product_id' => $product->id,
                'clicks_count' => rand(100, 500),
                'conversions_count' => rand(10, 50),
                'revenue' => rand(500, 2000),
                'date' => now()->format('Y-m-d'),
            ]);
        }
    }
}
