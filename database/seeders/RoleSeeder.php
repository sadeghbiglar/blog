<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $roles = [
            ['name' => 'admin', 'description' => 'Administrator with full access'],
            ['name' => 'writer', 'description' => 'Writer who can create and manage posts'],
            ['name' => 'senior_writer', 'description' => 'Senior writer who can edit all posts'],
            ['name' => 'user', 'description' => 'Regular user with basic access'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }

        // Create users and assign roles
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );
        $admin->roles()->sync(Role::where('name', 'admin')->first()->id);

        $writer = User::firstOrCreate(
            ['email' => 'writer@example.com'],
            [
                'name' => 'Writer User',
                'password' => bcrypt('password'),
            ]
        );
        $writer->roles()->sync(Role::where('name', 'writer')->first()->id);

        $seniorWriter = User::firstOrCreate(
            ['email' => 'senior_writer@example.com'],
            [
                'name' => 'Senior Writer',
                'password' => bcrypt('password'),
            ]
        );
        $seniorWriter->roles()->sync(Role::where('name', 'senior_writer')->first()->id);

        $user = User::firstOrCreate(
            ['email' => 'sbmail555@gmail.com'],
            [
                'name' => 'Sadegh Biglar',
                'password' => bcrypt('12345678'),
            ]
        );
        $user->roles()->sync(Role::where('name', 'user')->first()->id);
    }
}