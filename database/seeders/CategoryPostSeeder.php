<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CategoryPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::all();
        $categories = Category::all();

        if ($posts->isEmpty() || $categories->isEmpty()) {
            throw new \Exception('Please run PostSeeder and CategorySeeder first.');
        }

        // اتصال پست‌ها به دسته‌بندی‌ها به صورت تصادفی
        foreach ($posts as $post) {
            $randomCategoryIds = $categories->random(rand(1, 3))->pluck('id')->toArray();
            $post->categories()->sync($randomCategoryIds);
        }
    }
}
