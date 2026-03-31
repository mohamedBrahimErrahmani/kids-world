<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            $this->call([
                RoleSeeder::class,
                CategorySeeder::class,
                AgeGroupSeeder::class,
                PlayTypeSeeder::class,
                UserSeeder::class,
                ProductSeeder::class,
                AnalyticsSeeder::class,
                BlogPostSeeder::class,
            ]);
        } catch (\Exception $e) {
            \Log::error("Seeding failed: " . $e->getMessage());
            if (isset($e->errorInfo)) {
                \Log::error("Error Info: " . json_encode($e->errorInfo));
            }
            throw $e;
        }
    }
}
