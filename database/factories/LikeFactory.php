<?php

use App\Like;
use App\Photo;

/**
 * @var Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Like::class, function () {
    return [
        'photo_id' => function () {
            return factory(Photo::class)->create()->id;
        },
    ];
});
