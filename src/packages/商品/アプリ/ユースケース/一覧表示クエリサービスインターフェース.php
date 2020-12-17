<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;

interface 一覧表示クエリサービスインターフェース
{
    public function 全件取得(): 一覧表示クエリレスポンスデータ;
}
