<?php

use App\Entities\Comment;
use App\Entities\Photo;
use App\Entities\User;

/**
 * @var Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Comment::class, function (Faker\Generator $faker) {
    return [
        'photo_id' => function () {
            return factory(Photo::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'content' => substr($faker->text, 0, 500),
    ];
});
