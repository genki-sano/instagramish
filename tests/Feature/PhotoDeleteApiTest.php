<?php

namespace Tests\Feature;

use App\Photo;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PhotoDeleteApiTest extends TestCase
{
    use RefreshDatabase;

    /** @var mixed  */
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
     * 写真を削除できるか確認
     * @test
     */
    public function test_deletePhoto()
    {
        // テスト写真を作成
        factory(Photo::class)->create();
        $photo = Photo::all()->first();

        // ダミーファイルにアップロード
        Storage::fake('s3');
        UploadedFile::fake()->image($photo->filename);

        $response = $this->actingAs($this->user)
            ->json('DELETE', route('photo.delete', $photo->id));

        $response->assertStatus(200);

        // 写真が保存されていないことを確認
        $this->assertEmpty(Photo::all());
        // ストレージに写真が保存されていないことを確認
        $this->assertEquals(0, count(Storage::cloud()->files()));
    }
}
