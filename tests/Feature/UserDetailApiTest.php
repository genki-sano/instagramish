<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserDetailApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 会員詳細に必要なJSONを返却.
     * @test
     */
    public function test_returnUserDetailJson()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->json('GET', route('user.show', ['id' => $user->id]));

        $response->assertStatus(200)
            ->assertJson([
                'name' => $user->name,
                'email' => $user->email,
            ]);
    }
}
