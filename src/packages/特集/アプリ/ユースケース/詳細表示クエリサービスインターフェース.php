<?php

declare(strict_types=1);

namespace 特集\アプリ\ユースケース;

use 特集\インフラ\レスポンスデータ\特集レスポンスデータ;
use 特集\ドメイン\モデル\特集ID;

interface 詳細表示クエリサービスインターフェース
{
    public function IDで1件取得(特集ID $id): ?特集レスポンスデータ;
}
