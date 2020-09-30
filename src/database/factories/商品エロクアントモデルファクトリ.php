<?php
/* @var \Illuminate\Database\Eloquent\Factory $factory
 * 参考 Eloquent Model Factory を使ってテストデータを整備する
 * https://qiita.com/nunulk/items/06370af1594a10faa749
 */
use 商品\インフラ\エロクアント\商品エロクアント;
use Faker\Generator as Faker;

$factory->define(商品エロクアント::class, function (Faker $faker) {
    return [
        'id' => 1,
        '名前' => '登録済',
        'レンタル料金' => 1000,
    ];
}, '商品が1件登録済');
