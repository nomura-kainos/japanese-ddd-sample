<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use カート\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;
use カート\ドメイン\モデル\ユーザID;

interface 一覧表示クエリサービスインターフェース
{
    public function 全件取得(ユーザID $ユーザid): 一覧表示クエリレスポンスデータ;
}
