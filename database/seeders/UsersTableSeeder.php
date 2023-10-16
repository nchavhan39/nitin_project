<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Create a Admin
         User::create([
            'name' => 'Nitin Chavhan',
            'email' => 'nitin@example.com',
            'user_type' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

         // Create a User
         User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'user_type' => 'user',
            'password' => Hash::make('12345678'),
        ]);
    }
}
