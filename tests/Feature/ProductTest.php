<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
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



    /** @test */
    function guest_users_cannot_see_the_register_product_button()
    {
        $this->get('/products')
            ->assertStatus(200)
            ->assertDontSee('Crear producto');
    }

    /** @test */
    function authenticated_users_can_see_the_register_product_button()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->get('/products')
            ->assertStatus(200)
            ->assertSee('Crear producto');
    }


    /** @test */
    function authenticated_user_can_create_product()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');

        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->post('/products', [
                'name' => 'Portatil Asus',
                'price' => 25,
                'file' => $file,
            ])->assertRedirect('/products');

        $this->assertDatabaseHas('products', [
            'name' => 'Portatil Asus',
            'price' => 25,
        ]);

    }


    /** @test */
    function authenticated_user_can_update_product()
    {
        $user = factory(User::class)->create();

        $product = Product::create(['name' => 'Portatil Asus', 'price' => 800, 'file' => 'product_default.jpg']);

        $this->actingAs($user)
            ->post('/products/update', [
                'id' => $product->id,
                'name' => 'Portatil Asus Pro Max',
                'price' => 800
            ])->assertRedirect('/products');
    }


    /** @test */
    function authenticated_user_can_delete_product()
    {
        $user = factory(User::class)->create();

        $product = Product::create(['name' => 'Portatil Asus', 'price' => 800, 'file' => 'product_default.jpg']);

        $this->actingAs($user)
            ->delete("/products/{$product->id}")
            ->assertRedirect('/products');

        $this->assertDatabaseMissing('products', ['name' => 'Portatil Asus', 'price' => 800, 'file' => 'product_default.jpg']);
    }
}
