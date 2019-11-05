<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /** @var array 複数代入する属性 */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /** @var array JSONに含める属性 */
    protected $visible = [
        'name',
    ];

    /**
     * リレーションシップ - photosテーブル.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
