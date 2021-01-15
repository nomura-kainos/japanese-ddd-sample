<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\仕様\検証;

class 未登録ユーザ仕様 implements 検証
{
    public function __construct(
        private ユーザリポジトリインターフェース $ユーザリポ,
    ) {
    }

    public function 満たすか？($ユーザ): bool
    {
        if (!$ユーザ::ログイン済みか？()) {
           return true;
        }

        return false;
    }
}
