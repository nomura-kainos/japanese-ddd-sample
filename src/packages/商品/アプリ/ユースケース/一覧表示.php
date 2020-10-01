<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\ドメイン\モデル\商品リポジトリインターフェース;
use 商品\プレゼンテーション\ビューモデル\一覧ビューモデル;

class 一覧表示
{
    private $商品リポ;

    public function __construct(
        商品リポジトリインターフェース $商品リポ
    ) {
        $this->商品リポ = $商品リポ;
    }

    public function 実行(): 一覧ビューモデル
    {
        $複数商品 = $this->商品リポ->全件取得();

        return new 一覧ビューモデル($複数商品);
    }
}
