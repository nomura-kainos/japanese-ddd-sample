<?php

declare(strict_types=1);

namespace 共通\ID採番;

use Illuminate\Support\Facades\DB;

class DBシーケンス implements ID採番インターフェース
{
    public function 連番を発行する(string $テーブル名): int
    {
        $シーケンス名 = $テーブル名 . 'シーケンス';

        //idカラムに現在の値 + 1を挿入
        DB::table($シーケンス名)->update(['id' => DB::raw('LAST_INSERT_ID(id + 1)')]);

        return DB::table($シーケンス名)->selectRaw('LAST_INSERT_ID() as id')->first()->id;
    }
}
