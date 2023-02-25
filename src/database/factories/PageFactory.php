<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Page;

$factory->define(App\Page::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content01' => '内容です1',
        'image01' => $faker->image,
        'content02' => '内容です2',
        'image02' => $faker->image,
        'url' => $faker->url,
    ];
});
