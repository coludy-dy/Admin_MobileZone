<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {    
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '0945555566',
            'address' => 'Nay Pyi Taw',
            'password' => Hash::make('password'),
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),

                'address' => fake()->address(),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
