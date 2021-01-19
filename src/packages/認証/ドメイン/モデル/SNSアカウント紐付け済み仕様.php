<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\仕様\検証;

class SNSアカウント紐付け済み仕様 implements 検証
{
    public function __construct(
        private ユーザクエリサービスインターフェース $ユーザクエリ,
    ) {
    }

    public function 満たすか？($SNSアカウント): bool
    {
        $登録済みユーザ = $this->ユーザクエリ->登録済みの会員ユーザ取得($SNSアカウント->SNS名(), $SNSアカウント->id());
        if ($登録済みユーザ !== null) {
            return true;
        }

        return false;
    }
}
