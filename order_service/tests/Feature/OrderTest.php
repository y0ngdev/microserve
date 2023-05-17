<?php

namespace Tests\Feature;

use App\Models\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{

    /**
     * A feature test to add a new order     *     * @return void
     */    public function test_for_add_order(): void
{

    $order = Order::create([
        'product_id' => fake()->numberBetween(1, 2),
    ]);

    $payload = [
        "product_id" => $order->product_id,
    ];

    $this->json('POST', 'api/v1/orders', $payload)
        ->assertStatus(200)
        ->assertJson([
            'code' => '200',
            'message' => 'New Order created.',
        ]);
}

    /**
     * A feature test to get active order data based on order ID     *     * @return void
     */    public function test_get_order_by_id(): void
{
    $order_id = Order::get()->random()->id;
    $this->get('/api/v1/order/' . $order_id)
        ->assertStatus(200)
        ->assertJsonStructure(
            [
                '*' => [
                    'id',
                    'product' => [
                        'id',
                        'name',
                        'price',
                        'description'
                    ]
                ]
            ]
        );
}
}
