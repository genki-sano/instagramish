<?php

namespace Tests\Feature;

use App\Photo;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PhotoDeleteApiTest extends TestCase
{
    use RefreshDatabase;

    /** @var mixed  */
    private $user;
    /** @var mixed  */
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

        // ダミーファイルにアップロード
        Storage::fake('s3');
        UploadedFile::fake()->image($this->photo->filename);
    }

    /**
     * 写真を削除できるか確認
     * @test
     */
    public function test_deletePhoto()
    {
        $response = $this->actingAs($this->user)
            ->json('DELETE', route('photo.delete', $this->photo->id));

        $response->assertStatus(200);

        // 写真が保存されていないことを確認
        $this->assertEmpty(Photo::all());
        // ストレージに写真が保存されていないことを確認
        $this->assertEquals(0, count(Storage::cloud()->files()));
    }
}
