<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\リポジトリ\大カテゴリ;

use 共通\ID採番\ID採番インターフェース;
use 商品カテゴリ\インフラ\レスポンスデータ\商品カテゴリIDレスポンスデータ;
use 商品カテゴリ\インフラ\エロクアント\大カテゴリエロクアント;
use 商品カテゴリ\ドメイン\モデル\大カテゴリ\大カテゴリクエリサービスインターフェース;

class 大カテゴリクエリサービス implements 大カテゴリクエリサービスインターフェース
{
    public function __construct(
        private ID採番インターフェース $ID採番,
        private 大カテゴリエロクアント $大カテゴリエロクアント,
    ) {
    }

    public function 登録用に次の商品カテゴリIDを取得する(): 商品カテゴリIDレスポンスデータ
    {
        $新規採番id = $this->ID採番->連番を発行する($this->大カテゴリエロクアント->getTable());
        return new 商品カテゴリIDレスポンスデータ($新規採番id);
    }
}
