<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{

    use RefreshDatabase;

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



    /** @test */
    function guest_user_can_see_their_orders()
    {
        $product = Product::create(['name' => 'Portatil Asus', 'price' => 800,'file' => 'product_default.jpg']);

        $customer = factory(Customer::class)->create(['email' => 'apvalencia92@gmail.com']);
        $otherCustomer = factory(Customer::class)->create();

        $order = $customer->orders()->create(['code' => uniqid(), 'product_id' => $product->id]);
        $orderDifferent = $otherCustomer->orders()->create(['code' => uniqid(), 'product_id' => $product->id]);

        $this->post('/search-orders', ['search' => 'apvalencia92@gmail.com'])
            ->assertRedirect(route('orders.owner'));

        $this->get('/my-orders')
            ->assertViewHas('orders', function ($orders) use ($order, $orderDifferent) {
                return $orders->contains($order) && !$orders->contains($orderDifferent);
            });
    }


    /** @test */
    function order_status_created_to_payed()
    {
        $product = factory(Product::class)->create();
        $customer = factory(Customer::class)->create();
        $order = $customer->orders()->create(['code' => uniqid(), 'product_id' => $product->id]);

        $this->get("/orders/{$order->code}/payed")
            ->assertRedirect(route('orders.owner'));

        $this->assertDatabaseHas('orders', [
            'code' => $order->code,
            'status' => Order::PAYED
        ]);

    }


    /** @test */
    function order_status_created_to_reject()
    {
        $product = factory(Product::class)->create();
        $customer = factory(Customer::class)->create();
        $order = $customer->orders()->create(['code' => uniqid(), 'product_id' => $product->id]);

        $this->get("/orders/{$order->code}/reject")
            ->assertRedirect(route('orders.owner'));

        $this->assertDatabaseHas('orders', [
            'code' => $order->code,
            'status' => Order::REJECTED
        ]);

    }
}
