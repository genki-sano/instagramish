<?php

use App\Entities\Photo;
use App\Entities\User;
use Illuminate\Support\Str;

/**
 * @var Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Photo::class, function (\Faker\Generator $faker) {
    return [
        'id' => Str::random(12),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'filename' => Str::random(12).'.jpg',
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
