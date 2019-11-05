<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    /** @var mixed */
    private $user;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();

        // テストユーザー作成
        $this->user = factory(User::class)->create();
    }

    /**
     * 登録済みのユーザーを認証して返却.
     * @test
     */
    public function test_loginUser()
    {
        $data = [
            'email' => $this->user->email,
            'password' => 'secret',
        ];
        $response = $this->json('POST', route('login'), $data);

        $response->assertStatus(200)
            ->assertJson(['name' => $this->user->name]);

        $this->assertAuthenticatedAs($this->user);
    }
}
