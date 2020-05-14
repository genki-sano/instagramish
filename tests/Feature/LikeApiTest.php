<?php

namespace Tests\Feature;

use App\Entities\Photo;
use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikeApiTest extends TestCase
{
    use RefreshDatabase;

    /** @var mixed */
    private $user;
    /** @var mixed */
    private $photo;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();

        // テストユーザー作成
        $this->user = factory(User::class)->create();

        // テスト写真を作成
        factory(Photo::class)->create();
        $this->photo = Photo::all()->first();
    }

    /**
     * いいねを追加できる.
     * @test
     */
    public function test_addLike()
    {
        $response = $this->actingAs($this->user)
            ->json('PUT', route('photo.like', $this->photo->id));

        $response->assertStatus(200)
            ->assertJsonFragment(['photo_id' => $this->photo->id]);

        $this->assertEquals(1, $this->photo->likes()->count());
    }

    /**
     * 2回同じ写真にいいねしても1個しかいいねがつかない.
     * @test
     */
    public function test_addNotLikeWhenAddedAgain()
    {
        $param = ['id' => $this->photo->id];
        $this->actingAs($this->user)->json('PUT', route('photo.like', $param));
        $this->actingAs($this->user)->json('PUT', route('photo.like', $param));

        $this->assertEquals(1, $this->photo->likes()->count());
    }

    /**
     * いいねを解除できる.
     * @test
     */
    public function test_deleteLike()
    {
        $this->photo->likes()->attach($this->user->id);

        $response = $this->actingAs($this->user)
            ->json('DELETE', route('photo.like', $this->photo->id));

        $response->assertStatus(200)
            ->assertJsonFragment(['photo_id' => $this->photo->id]);

        $this->assertEquals(0, $this->photo->likes()->count());
    }
}
