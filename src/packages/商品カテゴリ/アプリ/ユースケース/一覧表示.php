<?php

declare(strict_types=1);

namespace 商品カテゴリ\アプリ\ユースケース;

use 商品カテゴリ\ドメイン\モデル\商品カテゴリリポジトリインターフェース;
use 商品カテゴリ\プレゼンテーション\ビューモデル\一覧ビューモデル;

class 一覧表示
{
    private $商品カテゴリリポ;

    public function __construct(商品カテゴリリポジトリインターフェース $商品カテゴリリポ)
    {
        $this->商品カテゴリリポ = $商品カテゴリリポ;
    }

    public function 実行(): 一覧ビューモデル
    {
        $複数カテゴリ = $this->商品カテゴリリポ->全件取得();

        return new 一覧ビューモデル($複数カテゴリ);
    }
}
