<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
// use App\Producto;
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Producto::class, function (Faker\Generator $faker) {
    return [
        	'NombreArticulo' => $faker->word,
            'Seccion' => $faker->word,
            'Precio' => $faker->number,
            'PaisOrigen' => $faker->word,
            'ruta' => $faker->url,
    ];
});