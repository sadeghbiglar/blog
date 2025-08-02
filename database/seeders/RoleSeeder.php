<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'description' => 'Administrator with full access'],
            ['name' => 'writer', 'description' => 'Writer who can create and manage posts'],
            ['name' => 'user', 'description' => 'Regular user with basic access'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Assign 'user' role to all existing users
        $userRole = Role::where('name', 'user')->first();
        $users = User::all();

        foreach ($users as $user) {
            $user->roles()->attach($userRole->id);
        }

        // Create an admin user for testing
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->attach($adminRole->id);
    }
}
