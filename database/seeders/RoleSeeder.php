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
            ['name' => 'super_admin', 'description' => 'Super Admin with absolute access'],
            ['name' => 'admin', 'description' => 'Administrator with full access'],
            ['name' => 'writer', 'description' => 'Writer who can create and manage posts'],
            ['name' => 'senior_writer', 'description' => 'Senior writer who can edit all posts'],
            ['name' => 'user', 'description' => 'Regular user with basic access'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }

        // Create Super Admin (non-deletable)
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('superpassword'),
            ]
        );
        $superAdmin->roles()->sync([Role::where('name', 'super_admin')->first()->id]);

        // Create normal Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );
        $admin->roles()->sync([Role::where('name', 'admin')->first()->id]);

        // Create Writer
        $writer = User::firstOrCreate(
            ['email' => 'writer@example.com'],
            [
                'name' => 'Writer User',
                'password' => bcrypt('password'),
            ]
        );
        $writer->roles()->sync([Role::where('name', 'writer')->first()->id]);

        // Create Senior Writer
        $seniorWriter = User::firstOrCreate(
            ['email' => 'senior_writer@example.com'],
            [
                'name' => 'Senior Writer',
                'password' => bcrypt('password'),
            ]
        );
        $seniorWriter->roles()->sync([Role::where('name', 'senior_writer')->first()->id]);

        // Create Normal User
        $user = User::firstOrCreate(
            ['email' => 'sbmail555@gmail.com'],
            [
                'name' => 'Sadegh Biglar',
                'password' => bcrypt('12345678'),
            ]
        );
        $user->roles()->sync([Role::where('name', 'user')->first()->id]);
    }
}
