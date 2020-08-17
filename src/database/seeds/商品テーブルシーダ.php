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
            '価格' => '18000',
        ];
        DB::table('商品')->insert($param);

        $param = [
            '名前' => '電動ドリル',
            '価格' => '8000',
        ];
        DB::table('商品')->insert($param);

        $param = [
            '名前' => 'モンキー',
            '価格' => '7000',
        ];
        DB::table('商品')->insert($param);
    }
}
