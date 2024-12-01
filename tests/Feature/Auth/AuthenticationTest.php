<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Тест авторизации пользователя через экран входа.
     */
    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        // Создаем пользователя с заполненными полями
        $user = User::factory()->create([
            'name' => 'John',
            'surname' => 'Doe',
            'fathername' => 'Smith',
            'email' => 'johndoe@example.com',
            'number' => '1234567890',
            'city' => 'New York',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'password' => '000000000', // Пароль
        ]);

        // Пытаемся войти
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '000000000',
        ]);

        // Проверяем, что пользователь аутентифицирован
        $this->assertAuthenticated();

        // Убеждаемся, что произошло перенаправление на маршрут dashboard
        $response->assertRedirect(route('profile', absolute: false));
    }

    /**
     * Тест на неудачную попытку авторизации с неверным паролем.
     */
    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        // Создаем пользователя с заполненными полями
        $user = User::factory()->create([
            'name' => 'John',
            'surname' => 'Doe',
            'fathername' => 'Smith',
            'email' => 'johndoe@example.com',
            'number' => '1234567890',
            'city' => 'New York',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'password' => bcrypt('password'), // Пароль
        ]);

        // Пытаемся войти с неверным паролем
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        // Убеждаемся, что пользователь остался гостем
        $this->assertGuest();
    }
}
