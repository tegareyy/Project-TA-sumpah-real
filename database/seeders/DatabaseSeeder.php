<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Tegar Irfan Hamid',
            'email' => 'Tegar@gmail.com',
            'uid' => '123',
            'gender' => 'male',
            'address' => 'Kampung Dalam RT 01 RW 04 NO 109',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // Password terenkripsi
            'role' => 'SuperAdmin'
        ]);

        User::create([
            'name' => 'L Azlan Rafar',
            'email' => 'Azlan@gmail.com',
            'uid' => '456',
            'gender' => 'female',
            'address' => 'Baloi Centre RT 04 RW 07',
            'email_verified_at' => now(),
            'password' => Hash::make('456'), // Password terenkripsi
            'role' => 'Teacher'
        ]);

        User::create([
            'name' => 'Dicky Darmawan',
            'email' => 'Dicky@gmail.com',
            'uid' => '789',
            'gender' => 'female',
            'address' => 'Tiban McDermott RT 01 RW 05',
            'email_verified_at' => now(),
            'password' => Hash::make('789'),
            'role' => 'Student'
        ]);
    }
}
