<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $writer = User::whereHas('roles', fn($query) => $query->where('name', 'writer'))->first();
        $user = User::where('email', 'sbmail555@gmail.com')->first();
        $post = Post::where('title', 'Introduction to Laravel')->first();

        if ($writer && $user && $post) {
            Comment::create([
                'post_id' => $post->id,
                'user_id' => $writer->id,
                'content' => 'Great post about Laravel!',
            ]);

            Comment::create([
                'post_id' => $post->id,
                'user_id' => $user->id,
                'content' => 'Very helpful, thanks!',
            ]);
        }
    }
}