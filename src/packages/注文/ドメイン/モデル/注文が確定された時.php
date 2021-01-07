<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

use 共通\ドメインイベント;

class 注文が確定された時 extends ドメインイベント
{
    private function __construct(private ユーザID $ユーザid)
    {
    }

    public static function 作成する(ユーザID $ユーザid)
    {
        return new self($ユーザid);
    }

    public function ユーザid(): int
    {
        return $this->ユーザid->値;
    }
}
