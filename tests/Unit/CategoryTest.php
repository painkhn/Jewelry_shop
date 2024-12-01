<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Тест для проверки создания категории.
     *
     * @return void
     */
    public function test_category_creation()
    {
        // Данные для создания категории
        $data = [
            'name' => 'Test Category',
        ];

        // Создаем категорию
        $category = Category::create($data);

        // Проверяем, что категория создалась
        $this->assertDatabaseHas('categories', $data);

        // Проверяем, что объект модели содержит правильные данные
        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('Test Category', $category->name);
    }
}
