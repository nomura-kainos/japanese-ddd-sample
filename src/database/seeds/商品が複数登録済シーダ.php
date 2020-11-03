<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class 商品が複数登録済シーダ extends Seeder
{
    public function run()
    {
        $テーブル名 = '商品';

        // データのクリア
        DB::table($テーブル名)->delete();

        $複数商品 = [
            [
                'id' => 1,
                '名前' => '登録済',
                'レンタル料金' => 1000,
                'カテゴリid' => 1,
            ],
            [
                'id' => 2,
                '名前' => '登録済',
                'レンタル料金' => 1000,
                'カテゴリid' => 1,
            ],
            [
                'id' => 3,
                '名前' => '登録済',
                'レンタル料金' => 1000,
                'カテゴリid' => 1,
            ]
        ];

        // データ挿入
        DB::table($テーブル名)->insert($複数商品);
    }
}
