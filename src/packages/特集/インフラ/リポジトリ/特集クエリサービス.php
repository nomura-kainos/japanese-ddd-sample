<?php

declare(strict_types=1);

namespace 特集\インフラ\リポジトリ;

use 共通\ID採番\ID採番インターフェース;
use 特集\インフラ\レスポンスデータ\特集IDレスポンスデータ;
use 特集\インフラ\エロクアント\特集エロクアント;
use 特集\ドメイン\モデル\特集クエリサービスインターフェース;

class 特集クエリサービス implements 特集クエリサービスインターフェース
{
    public function __construct(
        private ID採番インターフェース $ID採番,
        private 特集エロクアント $特集エロクアント,
    ) {
    }

    public function 登録用に次の特集IDを取得する(): 特集IDレスポンスデータ
    {
        $新規採番id = $this->ID採番->連番を発行する($this->特集エロクアント->getTable());
        return new 特集IDレスポンスデータ($新規採番id);
    }
}
