<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sigun;
use Faker\Generator as Faker;

$factory->define(Sigun::class, function (Faker $faker) {
    return [
        'code'  => $faker->unique()->lexify('CN??'),
        'name'  => $faker->unique()->lexify('충남??'),
        'seq'   => $faker->unique()->numberBetween($min=0, $max=100),
    ];
});
