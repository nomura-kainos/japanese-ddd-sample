<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class 商品テーブルシーダ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            '名前' => '草刈り機',
            'レンタル料金' => '18000',
        ];
        DB::table('商品')->insert($param);

        $param = [
            '名前' => '電動ドリル',
            'レンタル料金' => '8000',
        ];
        DB::table('商品')->insert($param);

        $param = [
            '名前' => 'モンキー',
            'レンタル料金' => '7000',
        ];
        DB::table('商品')->insert($param);
    }
}
