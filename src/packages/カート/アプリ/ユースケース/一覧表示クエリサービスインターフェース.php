<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use カート\インフラ\レスポンスデータ\カート内商品コレクションレスポンスデータ;
use カート\ドメイン\モデル\ユーザID;

interface 一覧表示クエリサービスインターフェース
{
    public function 全件取得(ユーザID $ユーザid): カート内商品コレクションレスポンスデータ;
}
