<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_create_product()
    {
        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', ['id' => $product->id]);
    }

    public function test_can_update_product()
    {
        $product = Product::factory()->create();

        $response = $this->put(route('products.update', $product->id), [
            'name' => 'Updated Product',
            "price"=>100,
            "description"=>"update",
            // Add other fields as needed
        ]);

        $this->assertDatabaseHas('products', ['name' => 'Updated Product']);
    }

    public function test_can_delete_product()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product->id));

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
