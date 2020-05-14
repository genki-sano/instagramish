<?php

namespace Tests\Feature;

use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
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
     * ログイン中のユーザーを返却.
     * @test
     */
    public function test_getLoginUser()
    {
        $response = $this->actingAs($this->user)
            ->json('GET', route('user'));

        $response->assertStatus(200)
            ->assertJson(['name' => $this->user->name]);
    }

    /**
     * ログインされていない場合は空文字を返却.
     * @test
     */
    public function test_returnEmptyIfNotLogin()
    {
        $response = $this->json('GET', route('user'));

        $response->assertStatus(200);
        $this->assertEquals('', $response->content());
    }
}
