<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Regular users
        User::create([
            'name' => 'Test naam',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'bio' => 'Music lover and party enthusiast! Always looking for the next great event.',
            'birthday' => '1995-06-15',
        ]);

        User::create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'bio' => 'Electronic music fan. Techno is life!',
            'birthday' => '1998-03-22',
        ]);

        User::create([
            'name' => 'Mike Chen',
            'email' => 'mike@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'birthday' => '2000-11-08',
        ]);

        User::create([
            'name' => 'Emma Williams',
            'email' => 'emma@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'bio' => 'DJ groupie and event photographer 📸',
            'birthday' => '1997-09-30',
        ]);
    }
}
