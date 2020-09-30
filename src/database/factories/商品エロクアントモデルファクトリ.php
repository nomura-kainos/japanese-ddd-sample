<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use 商品\インフラ\エロクアント\商品エロクアント;
use Faker\Generator as Faker;

$factory->define(商品エロクアント::class, function (Faker $faker) {
    return [
        'id' => 1,
        '名前' => '登録済',
        'レンタル料金' => 1000,
    ];
}, '商品が1件登録済');
