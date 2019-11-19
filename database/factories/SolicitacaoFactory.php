<?php

use App\Models\Solicitacao;
use Faker\Generator as Faker;

$factory->define(Solicitacao::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'data' => $faker->date,
        'descricao' => $faker->text,
        'user_id' => 1
    ];
});
