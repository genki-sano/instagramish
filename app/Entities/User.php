<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /** @var array 複数代入する属性 */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** @var array JSONに含める属性 */
    protected $visible = [
        'name',
    ];

    /**
     * リレーションシップ - photosテーブル.
     *
     * @return HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
