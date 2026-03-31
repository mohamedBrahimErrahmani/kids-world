<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\AgeGroup;
use App\Models\PlayType;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        try {
            $toys = Category::where('slug', 'toys')->first();
            $baby = Category::where('slug', 'baby-care')->first();

            $age01 = AgeGroup::where('slug', '0-1-years')->first();
            $age23 = AgeGroup::where('slug', '2-3-years')->first();
            $age35 = AgeGroup::where('slug', '4-6-years')->first(); // Closest match

            $educational = PlayType::where('slug', 'educational')->first();
            $fun = PlayType::where('slug', 'fun-games')->first();

            $products = [
                [
                    'name' => 'Nordic Pine Discovery Blocks',
                    'description' => 'Revolutionary light-reactive stacking system for cognitive growth.',
                    'price' => 45.00,
                    'category_id' => $toys->id,
                    'age_group_id' => $age23->id,
                    'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCzgmVtiI6sGdYH9Qn-jgDZi3qNVpmC17Xc7gbsF7zzdAWnNNnMgP2uhWpdXt8rw1JOsqPCrq-EYrm2sRV2duWBb1KjUOjGz4kEySJyz4WXux333g5tqXIjyrD7VEdNrBCuaMtNncOYSA9hbHYYpVUrAu9K8MHgFiv15qqM_quRjtkwdS8Sg78HgGhU9GgulizGRNdKHbwYNlJQQ7niX_E9XB3gTqTKgNMYyP1lHyosqcXA4DBknbLT47lGtBY3zlFtBQzMHnniIw',
                    'rating' => 4.9,
                    'status' => 'featured',
                    'is_active' => true,
                    'play_types' => [$educational->id, $fun->id]
                ],
                [
                    'name' => 'Organic Cotton Sleepy Bear',
                    'description' => 'GOTS certified cotton with temperature-regulating fiber technology.',
                    'price' => 32.00,
                    'category_id' => $baby->id,
                    'age_group_id' => $age01->id,
                    'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuALCoklgGmCVkwheGwtu0nlvRBva33lhMMQWKsqM4TVmFlDr4NJF_FpZLZPLWI6HDoxfOMHYsZg2YUn1-lSWtMwqHVW_y4Se7Eom4Oy47zqJE47ABscY2GnrrKlAIkN3B16NGYQn7QmWx4f_Pcpw9TIabbC1kfePb7DXcJJpTkd1SIFzvMdm7h0zB-ufGiQpWR5_n000Q73l2eqBimoaqg7xOsWjL6eGuF26rEfZTsEq107_vGnt7iR7nL7oB8ONHQrKaicU7YNJQ',
                    'rating' => 4.8,
                    'status' => 'featured',
                    'is_active' => true,
                    'play_types' => [$educational->id]
                ],
                [
                    'name' => 'Eco-Friendly Wooden Arch',
                    'description' => 'Develops gross motor skills and spatial awareness. FSC Certified sustainable birch wood.',
                    'price' => 189.00,
                    'category_id' => $toys->id,
                    'age_group_id' => $age23->id,
                    'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDEli9yd5oyc3YaGgSmVcqHk091HzwXq_IGV4Gfrezzij43WLLYhYqtxhWX3a4foHEbMFPqhBNOAyOrLkSIzFrm_86YVSkQSfO6PFMZhNAuHdwh3ZYE9NPbjncb-qtN1VqbVtCZj-dW7-8DGbwaQB5HWcIR0tBktJ87-rHS5TUvfLpOOeUqa49QDmnF0Vj_EA8z-fubA1ywDjocz6Lmxw9aUh4hoJ5EAVOw0T3s3OFBThGUsyaH_nnNiTGTx4Sg8YmtnV2ir-xHQA',
                    'rating' => 4.5,
                    'status' => 'featured',
                    'is_active' => true,
                    'play_types' => [$educational->id, $fun->id]
                ],
                [
                    'name' => 'Cognitive Stacking Tower',
                    'description' => 'Classic Montessori stacking tower for fine motor development.',
                    'price' => 28.50,
                    'category_id' => $toys->id,
                    'age_group_id' => $age01->id,
                    'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBFw3BqSabSSoRtwLcJCjDE0YbaExD60_jD-rlXgr9MkxBHAGFSfh-HJMFCohlRK1YsRkGiFX_bNnWuk6Vn13NMe52efvJvb-jsF7lI-7GQ5CQ-47TVqV-RdXHvL_pqv6CenBuXMmOPKyZ4W-YPByb7CjLY4gN2PlYITm7vSlEWAvoQZGWMuaV2eXle1ir6O1A7iYTc6l1pW8uNVnoHU5M5cizb6_N6VqK-eT0IocyiqU8IUWAq2SHoMl9D2VyjggDVDGs4Rrx-Kw',
                    'rating' => 5.0,
                    'status' => 'featured',
                    'is_active' => true,
                    'play_types' => [$educational->id]
                ],
            ];

            foreach ($products as $prod) {
                $playTypes = $prod['play_types'] ?? [];
                unset($prod['play_types']);

                $product = Product::create($prod + [
                    'slug' => Str::slug($prod['name']),
                    'sku' => Str::upper(Str::random(8))
                ]);

                $product->playTypes()->attach($playTypes);
            }
        } catch (\Exception $e) {
            $this->command->error($e->getMessage());
            throw $e;
        }
    }
}
