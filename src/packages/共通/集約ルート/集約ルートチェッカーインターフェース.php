<?php

declare(strict_types=1);

namespace 共通\集約ルート;

interface 集約ルートチェッカーインターフェース
{
    public static function チェック(object $エンティティ);
}
