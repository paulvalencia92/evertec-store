<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderAdminTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    function authenticated_user_can_see_all_orders()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->get('/orders')
            ->assertStatus(200);
    }

    /** @test */
    function unauthenticated_user_cannot_see_all_orders()
    {
        $this->get('/orders')
            ->assertRedirect('login');
    }
}
