<?php

use App\Entities\Like;
use App\Entities\Photo;
use App\Entities\User;

/**
 * @var Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Like::class, function () {
    return [
        'photo_id' => function () {
            return factory(Photo::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
