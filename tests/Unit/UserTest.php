<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetProducts()
    {
        $user = User::whereHas('products')->inRandomOrder()->first();
        $this->getJson("/api/user/$user->id/products")
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'brand',
                    'created_at',
                    'updated_at',
                    'variants' => [
                        '*' => [
                            'id',
                            'type',
                            'value',
                            'product_id',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]
            ]);
    }
}
