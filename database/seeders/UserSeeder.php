<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Wygeneruj 20 losowych samochodów
        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'role' => 'user',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}