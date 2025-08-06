<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Find a writer user
        $writer = User::whereHas('roles', fn($query) => $query->where('name', 'writer'))->first();

        if (!$writer) {
            throw new \Exception('No user with role "writer" found. Please run RoleSeeder first.');
        }

        // Create posts
        Post::create([
            'title' => 'Introduction to Laravel',
            'slug' => Str::slug('Introduction to Laravel'),
            'content' => 'This post introduces the Laravel framework and its features.',
            'user_id' => $writer->id,
            'image' => 'posts/laravel.jpg',
            'published_at' => now(),
            'views' => 150,
          
        ]);

        Post::create([
            'title' => 'Getting Started with Livewire',
            'slug' => Str::slug('Getting Started with Livewire'),
            'content' => 'Learn how to build dynamic interfaces with Livewire.',
            'user_id' => $writer->id,
            'image' => 'posts/livewire.jpg',
            'published_at' => now()->subDay(),
            'views' => 80,
            
        ]);

        Post::create([
            'title' => 'Draft Post Example',
            'slug' => Str::slug('Draft Post Example'),
            'content' => 'This is a draft post, not yet published.',
            'user_id' => $writer->id,
            'image' => 'posts/draft.jpg',
            'published_at' => null,
            'views' => 0,
           
        ]);
    }
}