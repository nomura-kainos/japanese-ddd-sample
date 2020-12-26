<?php

declare(strict_types=1);

namespace 商品カテゴリ\アプリ\ユースケース\小カテゴリ;

use 商品\ドメイン\モデル\カテゴリID;
use 商品カテゴリ\インフラ\レスポンスデータ\小カテゴリ\一覧表示クエリレスポンスデータ;

interface 一覧表示クエリサービスインターフェース
{
    public function 全件取得(カテゴリID $大カテゴリid): 一覧表示クエリレスポンスデータ;
}
