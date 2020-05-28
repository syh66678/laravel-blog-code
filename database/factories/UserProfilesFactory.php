<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'bio' => $faker->name,
        'city' => $faker->cityPrefix,
        'user_id' => $faker->unique()->numberBetween(1,1000)
    ];
});
