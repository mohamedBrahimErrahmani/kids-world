<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        // Make sure you have at least one user in users table
        $authorId = DB::table('users')->value('id');

        if (!$authorId) {
            return;
        }

        $posts = [
            [
                'title' => 'First Blog Post',
                'content' => 'This is the content of the first blog post.',
                'image_path' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Laravel Tips',
                'content' => 'Some useful Laravel tips and tricks.',
                'image_path' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Web Development 33',
                'content' => 'Latest trends in web development in 2026.',
                'image_path' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Web Development 22',
                'content' => 'Latest trends in web development in 2026.',
                'image_path' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Web Development 44',
                'content' => 'Latest trends in web development in 2026.',
                'image_path' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Web Development 55',
                'content' => 'Latest trends in web development in 2026.',
                'image_path' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&auto=format&fit=crop',
            ],
        ];

        foreach ($posts as $post) {
            DB::table('blog_posts')->insert([
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'content' => $post['content'],
                'image_path' => $post['image_path'],
                'author_id' => $authorId,
                'published_at' => Carbon::now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}