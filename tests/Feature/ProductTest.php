<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_product_index(): void
    {
        $response = $this->getJson(route('product.index'));
        $response->assertOk();
    }

    public function test_products_return()
    {
        Product::factory(5)->create();
        $response = $this->getJson('/api/product');
    }

    public function test_product_create()
    {
        $product = Product::factory()->make();
        $response = $this->postJson('api/product');
        $response->assertCreated();
    }
}
