<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_order(): void
    {
        $response = $this->postJson('/api/order', [
            'customer_id' => 1,
            'products' => [
                [
                    'product_id' => 1,
                    'quantity' => 2,
                ],
                [
                    'product_id' => 2,
                    'quantity' => 1,
                ],
            ],
            'payment_method_id' => [1,2],
        ]);

        $response->assertStatus(200);
    }

    public function test_get_orders(): void
    {
        $response = $this->getJson('/api/order');

        $response->assertStatus(200);
    }
}
