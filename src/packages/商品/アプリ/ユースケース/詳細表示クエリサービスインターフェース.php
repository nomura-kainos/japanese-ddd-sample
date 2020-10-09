<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\インフラ\レスポンスデータ\商品レスポンスデータ;
use 商品\ドメイン\モデル\商品ID;

interface 詳細表示クエリサービスインターフェース
{
    public function IDで1件取得(商品ID $id): ?商品レスポンスデータ;
}
