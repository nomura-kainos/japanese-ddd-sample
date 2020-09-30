<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class 商品シーダー extends Seeder
{
    public function run()
    {
        DB::table('商品')->insert([
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000
        ]);
    }
}
