<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountrySeeder::class);
        $this->call(LanguageSeeder::class);
        User::factory(50)->create();
        $this->call( RoleSeeder::class);
         $this->call(PostSeeder::class);
          $this->call(CommentSeeder::class);
    }
}
