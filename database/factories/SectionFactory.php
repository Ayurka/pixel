<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'description' => $faker->text(100),
        'logo' => $faker->image('public/storage/files',400,300, null, false)
    ];
});
