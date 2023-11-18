<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_create_category()
    {
        $category = Category::factory()->create();

        $this->assertDatabaseHas('categories', ['id' => $category->id]);
    }

    public function test_can_update_category()
    {
        $category = Category::factory()->create();

        $response = $this->put(route('categories.update', $category->id), [
            'name' => 'Updated Category',
            "parent"=>null
        ]);

        $this->assertDatabaseHas('categories', ['name' => 'Updated Category']);
    }

    public function test_can_delete_category()
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('categories.destroy', $category->id));

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
