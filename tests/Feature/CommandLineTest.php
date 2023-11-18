<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommandLineTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_can_create_product_via_cli()
    {
        $this->artisan('product:create', [
            'name' => 'New Product',
            "price"=>100,
            "description"=>"update",

            // Add other fields as needed
        ]);

        $this->assertDatabaseHas('products', ['name' => 'New Product']);
    }

    public function test_can_delete_product_via_cli()
    {
        $product = Product::factory()->create();

        $this->artisan('product:delete', ['id' => $product->id]);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_can_create_category()
    {
        $this->artisan('category:create', [
            'name' => 'New Category',
            // Add other fields as needed
        ]);

        $this->assertDatabaseHas('categories', ['name' => 'New Category']);
    }

    public function test_can_delete_category()
    {
        $category = Category::factory()->create();

        $this->artisan('category:delete', ['id' => $category->id]);

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
