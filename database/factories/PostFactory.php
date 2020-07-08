<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->sentence(15),
        'content' => $faker->randomHtml(2,3),
        'image' => $faker->imageUrl(),
        'published_at' => $faker->randomElement([null, Carbon::now()])
    ];
});
