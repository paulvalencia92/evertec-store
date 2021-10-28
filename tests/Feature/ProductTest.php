<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class ProductTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    function guest_user_can_view_products()
    {

        Product::create(['name' => 'Portatil Asus', 'price' => 800, 'file' => 'product_default.jpg']);
        Product::create(['name' => 'Teclado Gamer', 'price' => 20, 'file' => 'product_default.jpg']);

        $this->get('/products')
            ->assertStatus(200)
            ->assertSee('Portatil Asus')
            ->assertSee('Teclado Gamer')
            ->assertDontSee('Mouse Inalambrico');
    }
}
