<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        } else {
            $user = $users->first();
        }

        Post::create([
            'title' => 'First Blog Post',
            'slug' => Str::slug('First Blog Post'),
            'content' => 'This is the content of the first blog post.',
            'user_id' => $user->id,
            'image' => 'posts/sample-image.jpg',
            'published_at' => now(),
            'views' => 100,
            'likes' => 10,
        ]);

        Post::create([
            'title' => 'Second Blog Post',
            'slug' => Str::slug('Second Blog Post'),
            'content' => 'This is the content of the second blog post.',
            'user_id' => $user->id,
            'image' => 'posts/sample-image2.jpg',
            'published_at' => now(),
            'views' => 50,
            'likes' => 5,
        ]);
    }
}
