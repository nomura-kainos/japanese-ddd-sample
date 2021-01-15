<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 認証\インフラ\レスポンスデータ\ユーザレスポンスデータ;

interface 登録済みユーザクエリサービスインターフェース
{
    public function 取得(string $SNS名, string $SNSアカウントid): ?ユーザレスポンスデータ;
}
