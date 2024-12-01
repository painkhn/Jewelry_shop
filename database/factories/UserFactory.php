<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'fathername' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'number' => $this->faker->phoneNumber,
            'city' => $this->faker->city,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birthday' => $this->faker->date('Y-m-d', '2002-01-01'),
            'password' => bcrypt('password'), // Пароль
            'remember_token' => Str::random(10),
        ];
    }
}
