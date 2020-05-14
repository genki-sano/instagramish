<?php

use App\Entities\Comment;
use App\Entities\Photo;

/**
 * @var Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Comment::class, function (\Faker\Generator $faker) {
    return [
        'photo_id' => function () {
            return factory(Photo::class)->create()->id;
        },
        'content' => substr($faker->text, 0, 500),
    ];
});
