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
    // Создание администратора 
    {
        User::factory()->create([
            'name' => 'admin',
            'surname' => 'admin',
            'fathername' => 'admin',
            'email' => 'admin@gmail.com',
            'number' => '00000000000',
            'city' => 'Москва',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'is_admin' => true,
            'password' => Hash::make('00000000'),
        ]);
        User::factory()->create([
            'name' => 'Владислав',
            'surname' => 'Олегович',
            'fathername' => 'Куралеся',
            'email' => 'vlad@gmail.com',
            'number' => '00000000000',
            'city' => 'Москва',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'is_admin' => true,
            'created_at' => '2024-11-27 12:51:41',
            'password' => Hash::make('00000000'),
        ]);
    }
}
