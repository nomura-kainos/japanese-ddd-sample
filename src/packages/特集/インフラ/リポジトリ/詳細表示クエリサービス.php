<?php

declare(strict_types=1);

namespace 特集\インフラ\リポジトリ;

use 特集\アプリ\ユースケース\詳細表示クエリサービスインターフェース;
use 特集\インフラ\エロクアント\特集エロクアント;
use 特集\インフラ\レスポンスデータ\特集レスポンスデータ;
use 特集\ドメイン\モデル\特集ID;

class 詳細表示クエリサービス implements 詳細表示クエリサービスインターフェース
{
    private $特集エロクアント;

    public function __construct(特集エロクアント $特集エロクアント)
    {
        $this->特集エロクアント = $特集エロクアント;
    }

    public function IDで1件取得(特集ID $id): ?特集レスポンスデータ
    {
        $特集 = $this->特集エロクアント::select(
            '特集.*',
        )
            ->where('特集.id', '=', $id->値)
            ->first();

        if ($特集 === null) {
            return null;
        }
        return new 特集レスポンスデータ($特集);
    }
}
