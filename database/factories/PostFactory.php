<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
		'title' => $faker->sentence(),
		'body' => $faker->paragraphs(mt_rand(3,6),true),
		'slug' => $faker->slug,
		'user_id' => mt_rand(1,3),
        'created_at' => $faker->dateTimeBetween('-1 years','+1 years'), 
        'updated_at' => $faker->dateTimeBetween('+0 days','+2 years')
		];
	});
