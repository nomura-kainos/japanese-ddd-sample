<?php

declare(strict_types=1);

namespace 商品カテゴリ\アプリ\ユースケース;

use 商品カテゴリ\インフラ\レスポンスデータ\詳細表示クエリレスポンスデータ;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリID;

interface 詳細表示クエリサービスインターフェース
{
    public function IDで1件取得(商品カテゴリID $id): ?詳細表示クエリレスポンスデータ;
}
