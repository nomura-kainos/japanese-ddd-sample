<?php

declare(strict_types=1);

namespace 共通\集約ルート;

use 共通\集約ルート;

class 集約ルートチェッカー implements 集約ルートチェッカーインターフェース
{
    public static function チェック(object $エンティティ)
    {
        if (!$エンティティ instanceof 集約ルート) {
            throw new 集約ルートインスタンス例外();
        }
    }
}
