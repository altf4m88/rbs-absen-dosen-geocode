<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Teacher User',
            'email' => 'teacher@example.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Principal User',
            'email' => 'principal@example.com',
            'password' => bcrypt('password'),
            'role' => 'principal',
        ]);

        // Additional teacher users
        \App\Models\User::factory()->count(5)->create([
            'role' => 'teacher',
        ]);
    }
}
