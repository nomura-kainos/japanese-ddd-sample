<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class 商品が1件登録済シーダ extends Seeder
{
    public function run()
    {
        $テーブル名 = '商品';

        // データのクリア
        DB::table($テーブル名)->delete();

        // データ挿入
        DB::table($テーブル名 . 'シーケンス')->insert([
            'id' => 1,
        ]);

        DB::table($テーブル名)->insert([
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000,
            '大カテゴリid' => 1,
            '小カテゴリid' => 1,
        ]);
    }
}
