<?php

declare(strict_types=1);

namespace 注文\インフラ\リポジトリ;

use 共通\ID採番\ID採番インターフェース;
use 注文\インフラ\レスポンスデータ\注文IDレスポンスデータ;
use 注文\インフラ\エロクアント\注文エロクアント;
use 注文\ドメイン\モデル\注文クエリサービスインターフェース;

class 注文クエリサービス implements 注文クエリサービスインターフェース
{
    public function __construct(
        private ID採番インターフェース $ID採番,
        private 注文エロクアント $注文エロクアント,
    ) {
    }

    public function 登録用に次の注文IDを取得する(): 注文IDレスポンスデータ
    {
        $新規採番id = $this->ID採番->連番を発行する($this->注文エロクアント->getTable());
        return new 注文IDレスポンスデータ($新規採番id);
    }
}
