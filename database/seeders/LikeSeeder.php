<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    public function run(): void
    {
        $writer = User::whereHas('roles', fn($query) => $query->where('name', 'writer'))->first();
        $user = User::where('email', 'sbmail555@gmail.com')->first();
        $post = Post::where('title', 'Introduction to Laravel')->first();

        if ($writer && $user && $post) {
            Like::create([
                'user_id' => $writer->id,
                'post_id' => $post->id,
            ]);
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
        }
    }
}