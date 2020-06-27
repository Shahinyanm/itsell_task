<?php

/** @var Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

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

$factory->define(Product::class, function (Faker $faker) {
    $category = \App\Models\Category::inRandomOrder()->first();
    return [
        'title' => $faker->name .' '. $category->title,
        'image' => $category->image,
        'price' => rand(50,500),
        'category_id' => $category->id ,
    ];
});
