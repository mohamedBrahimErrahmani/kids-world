<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $toys = Category::where('slug', 'toys')->first();
        $baby = Category::where('slug', 'baby-care')->first();

        $products = [
            [
                'name' => 'LumiStack Modular Blocks',
                'description' => 'Revolutionary light-reactive stacking system for cognitive growth.',
                'price' => 49.99,
                'category_id' => $toys->id,
                'age_group' => '3-5 Years',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCVSVPXNj30Glf5H9nNHsmKk0a-paKYqpJ4COyffLqwoFrAOC9PENq4o8w-RFTJ3nQ1oJ9S405fIQ4tLomEZMsgQG8pk0fo0CWTSgP-JekDz1-jesXU16aFdZbFGQUdrA4B2z6vt3DPYLbjWvRAqGLlbJH6M_xRDiHlXjk0uCGFsVc1AF6Ew3kqbpTdrausQ4EvqZGVq3RIbgQwIkFkFdmWUUBXEIdje9wdmJJaXe09w-9O0lUQPbTqfyLtp-xzx8_dQ3gvtV2pPQ',
                'rating' => 5.0,
                'status' => 'featured',
                'is_active' => true
            ],
            [
                'name' => 'CloudKnit Organic Sleepsuit',
                'description' => 'GOTS certified cotton with temperature-regulating fiber technology.',
                'price' => 34.50,
                'category_id' => $baby->id,
                'age_group' => '0-12 Months',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCwGElMBpn3pXI1hb4jn5j_UrW5Cxz-20E35-PBKjWc4waPuddFo4IgrKJ6dUXuzGrsUqETgI-pljFUDgUI9GALL8Oa62mtGP_ki9zU9ywLXQeV2aJiqpZZ7lW-etrOlfgsgsDFmX74JY2ciVagOKn9Qf3xXcHIYbHZ3yeEvzPp4mw5usgPXbMLnUjLJnq8yv8egDjrV5mtmPTfH9jdZbvYtxKJXgMrTIgh26kiTmD0oLUfQVvIbpf111ijFKx-SgGAb2W0Up0vGw',
                'rating' => 4.8,
                'status' => 'featured',
                'is_active' => true
            ],
        ];

        foreach ($products as $prod) {
            Product::create($prod + ['slug' => Str::slug($prod['name']), 'sku' => Str::upper(Str::random(8))]);
        }
    }
}
