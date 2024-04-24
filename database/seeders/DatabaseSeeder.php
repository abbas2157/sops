<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'type' => 'admin',
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Trainer',
            'email' => 'trainer@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('trainer'),
            'type' => 'trainer',
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Trainee',
            'email' => 'trainee@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('trainee'),
            'type' => 'trainee',
            'remember_token' => Str::random(10),
        ]);
    }
}
