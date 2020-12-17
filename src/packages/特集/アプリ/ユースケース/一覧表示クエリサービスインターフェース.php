<?php

declare(strict_types=1);

namespace 特集\アプリ\ユースケース;

use 特集\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;

interface 一覧表示クエリサービスインターフェース
{
    public function 全件取得(): 一覧表示クエリレスポンスデータ;
}
