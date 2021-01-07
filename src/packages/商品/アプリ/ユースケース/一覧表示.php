<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\プレゼンテーション\ビューモデル\一覧ビューモデル;

class 一覧表示
{
    public function __construct(private 一覧表示クエリサービスインターフェース $一覧表示クエリサービス)
    {
    }

    public function 実行(): 一覧ビューモデル
    {
        $複数商品 = $this->一覧表示クエリサービス->全件取得();

        return new 一覧ビューモデル($複数商品);
    }
}
