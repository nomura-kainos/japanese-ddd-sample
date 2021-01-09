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
        if ($ユーザ::ログイン済みか？()) {
           return true;
        }

        $登録済みユーザ = $this->ユーザリポ->IDで1件取得(new ユーザID($ユーザ::id()));
        if ($登録済みユーザ === null) {
            return true;
        }

        return false;
    }
}
