<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Coupon;
use Faker\Generator as Faker;
use App\Enums\Coupon as EnumCoupon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'code' => Coupon::generateCode(),
        'type' => EnumCoupon::Percent,
        'value' => 10,
    ];
});
