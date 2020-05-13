<?php

use App\User;
use Illuminate\Support\Str;

/** @var Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (\Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10),
    ];
});
