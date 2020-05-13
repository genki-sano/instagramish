<?php

/** @var Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Comment::class, function (\Faker\Generator $faker) {
    return [
        'content' => substr($faker->text, 0, 500),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
