<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /** @test */
    function guest_user_can_generate_order()
    {
        $product = Product::create(['name' => 'Portatil Asus', 'price' => 800, 'file' => 'product_default.jpg']);
        $this->post('/orders', [
            'email' => 'apvalencia92@gmail.com',
            'name' => 'Paul Valencia',
            'movil' => '3188308972',
            'address' => 'Calle falsa 1234',
            'city' => 'El Cerrito, Valle del cauca',
            'product_id' => $product->id
        ])->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('customers', [
            'email' => 'apvalencia92@gmail.com',
            'name' => 'Paul Valencia',
            'movil' => '3188308972',
        ]);

        $this->assertDatabaseHas('orders', [
            'product_id' => $product->id
        ]);
    }
}
