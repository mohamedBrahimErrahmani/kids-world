<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('slug', 'admin')->first();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@kidsworld.co',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
            'status' => 'active',
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('slug', 'editor')->first()->id,
            'status' => 'active',
        ]);
    }
}
