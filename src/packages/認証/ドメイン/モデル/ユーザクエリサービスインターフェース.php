<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 認証\インフラ\レスポンスデータ\ユーザレスポンスデータ;
use 認証\インフラ\レスポンスデータ\ユーザIDレスポンスデータ;

interface ユーザクエリサービスインターフェース
{
    public function 登録用に次のユーザIDを取得する(): ユーザIDレスポンスデータ;

    public function IDで1件取得(ユーザID $id): ?ユーザレスポンスデータ;

    public function 登録済みの会員ユーザ取得(string $SNS名, string $SNSアカウントid): ?ユーザレスポンスデータ;
}
