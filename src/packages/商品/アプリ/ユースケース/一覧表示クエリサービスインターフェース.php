<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\インフラ\レスポンスデータ\商品コレクションレスポンスデータ;

interface 一覧表示クエリサービスインターフェース
{
    public function 全件取得(): 商品コレクションレスポンスデータ;
}
