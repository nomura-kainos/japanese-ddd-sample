<?php

declare(strict_types=1);

namespace 共通\仕様;

use Illuminate\Support\Facades\DB;

class 選択リポジトリ implements 選択リポジトリインターフェース
{
    public function 満たすレコードを1件取得(string $テーブル名, 選択 $仕様): mixed
    {
        $全レコード = DB::table($テーブル名)->get();
        if ($全レコード->isEmpty()) {
            return null;
        }

        $仕様->基準を設定する($全レコード->toArray());

        $仕様を満たすレコード = $全レコード->filter(function ($レコード) use ($仕様) {
            return $仕様->満たすか？($レコード);
        });

        if ($仕様を満たすレコード->isEmpty()) {
            return null;
        }

        return $仕様を満たすレコード->first();
    }
}
