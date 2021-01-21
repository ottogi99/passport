<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Nonghyup;
use App\Sigun;
use Faker\Generator as Faker;

$factory->define(Nonghyup::class, function (Faker $faker) {
    return [
        'code'          =>  $faker->unique()->regexify('^[A-Za-z]{1}[A-Za-z0-9_]{7}$'),
        'name'          =>  $faker->name,
        'address'       =>  $faker->address,
        'addr_part1'    =>  $faker->address,
        'addr_part2'    =>  $faker->address,
        'contact'       =>  $faker->unique()->regexify('^01(0|1|6|7|8|9)([0-9]{3,4})([0-9]{4})$'),
        'ceo'           =>  $faker->name,
        'seq'           =>  $faker->randomDigit,
        'sigun'         =>  function () use ($faker){
                                return App\Sigun::find($faker->numberBetween(1,15))->code;
                            },
    ];
});
