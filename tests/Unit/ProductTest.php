<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateProduct()
    {
        $productData = [
            'name' => $this->faker->word,
            'brand' => $this->faker->company
        ];

        $this->postJson('api/products/create', $productData)
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $productData['name'],
                'brand' => $productData['brand']
            ])
            ->assertJsonStructure([
                'name',
                'brand',
                'updated_at',
                'created_at',
                'id',
                'variants'
            ]);
    }

    public function testRetrieveProduct()
    {
        $product = Product::inRandomOrder()->first();

        $this->getJson('api/products/'.$product->id)
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $product->name,
                'brand' => $product->brand
            ])
            ->assertJsonStructure([
                'name',
                'brand',
                'updated_at',
                'created_at',
                'id',
                'variants'
            ]);
    }

    public function testDeleteProduct()
    {
        $product = factory('App\Product')->create();

        $this->deleteJson('api/products/'.$product->id.'/delete')
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $product->name,
                'brand' => $product->brand
            ])
            ->assertJsonStructure([
                'name',
                'brand',
                'updated_at',
                'created_at',
                'id'
            ]);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
        $this->assertDatabaseMissing('variants', ['product_id' => $product->id]);
    }
}
