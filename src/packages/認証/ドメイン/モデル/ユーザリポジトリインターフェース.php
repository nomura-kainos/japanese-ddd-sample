<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 認証\インフラ\レスポンスデータ\ユーザレスポンスデータ;
use 認証\インフラ\レスポンスデータ\ユーザIDレスポンスデータ;

interface ユーザリポジトリインターフェース
{
    public function 登録用に次のユーザIDを取得する(): ユーザIDレスポンスデータ;

    public function IDで1件取得(ユーザID $id): ?ユーザレスポンスデータ;

    public function SNS紐付け済みユーザを1件取得(string $SNSアカウントid, string $SNS名): ?ユーザレスポンスデータ;

    public function 保存(ユーザ $ユーザ): ユーザレスポンスデータ;

    public function SNSアカウント紐付け(ユーザID $ユーザid, SNSアカウント $SNSアカウント);
}
