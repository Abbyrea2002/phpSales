<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use App\Models\Sale;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaleTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_returns_sales_list(): void
    {
        $user = User::factory()->create();
        $sale = Sale::create([
            'item_name' => "nintendo switch game",
            'description' => "super mario",
            'quantity' => 1,
            'price' => 30,
            'payment_method' => "card",
        ]);

        $response = $this->actingAs($user)->getJson(route('sales.index'));

        $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJson([
            'data' => [Arr::only($sale->toArray(), ['id', 'item_name'])]
        ]);
}
public function test_api_sale_update_successful()
{
    $user = User::factory()->create();
    $sale = Sale::create([
        'item_name' => "nintendo switch game",
        'description' => "super mario",
        'quantity' => 1,
        'price' => 30,
        'payment_method' => "card",
    ]);
    $saleChanges = ['id' => 1, 'item_name' => 'nintendo switch', 'description' => 'gaming console', 'quantity' => 1, 'price' => '80', 'payment_method' => 'card',];

    $response = $this->actingAs($user)->putJson(route('sales.update', $sale), $saleChanges);
    
    dump($response->getContent());

    $response->assertStatus(200)
        ->assertJsonFragment([
                    "id" => 1,
                    'item_name' => "nintendo switch",
                    'description' => "gaming console",
                    'quantity' => 1,
                    'price' => "80",
                    'payment_method' => "card",
        ]
        );
}

}




