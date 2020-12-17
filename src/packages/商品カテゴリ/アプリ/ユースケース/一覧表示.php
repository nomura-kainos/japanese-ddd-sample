<?php

declare(strict_types=1);

namespace 商品カテゴリ\アプリ\ユースケース;

use 商品カテゴリ\プレゼンテーション\ビューモデル\一覧ビューモデル;

class 一覧表示
{
    private $一覧表示クエリサービス;

    public function __construct(一覧表示クエリサービスインターフェース $一覧表示クエリサービス)
    {
        $this->一覧表示クエリサービス = $一覧表示クエリサービス;
    }

    public function 実行(): 一覧ビューモデル
    {
        $複数商品 = $this->一覧表示クエリサービス->全件取得();

        return new 一覧ビューモデル($複数商品);
    }
}