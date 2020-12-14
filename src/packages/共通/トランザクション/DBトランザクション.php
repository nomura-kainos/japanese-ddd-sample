<?php

declare(strict_types=1);

namespace 共通\トランザクション;

use Illuminate\Support\Facades\DB;

/*
 * https://readouble.com/laravel/5.8/ja/database.html
 */
class DBトランザクション implements トランザクションインターフェース
{
    public function スコープ(callable $トランザクションスコープ): ?object
    {
        return DB::transaction($トランザクションスコープ);
    }

    public function 開始()
    {
        DB::beginTransaction();
    }

    public function コミット()
    {
        DB::commit();
    }

    public function ロールバック()
    {
        DB::rollBack();
    }
}
