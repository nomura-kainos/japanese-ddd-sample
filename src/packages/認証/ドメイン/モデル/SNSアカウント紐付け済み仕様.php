<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\仕様\検証;

class SNSアカウント紐付け済み仕様 implements 検証
{
    public function __construct(
        private 登録済みユーザクエリサービスインターフェース $登録済みユーザクエリ,
    ) {
    }

    public function 満たすか？($SNSアカウント): bool
    {
        $登録済みユーザ = $this->登録済みユーザクエリ->取得($SNSアカウント->SNS名(), $SNSアカウント->id());
        if ($登録済みユーザ !== null) {
            return true;
        }

        return false;
    }
}
