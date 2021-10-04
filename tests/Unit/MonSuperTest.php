<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class MonSuperTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_creation()
    {
        $user = User::factory(User::class)->make();
        
        $response = $this->actingAs($user)->get('registration');

        $response->assertRedirect('home');
    }
}