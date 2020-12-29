<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\ドメイン\モデル\商品リポジトリインターフェース;
use 商品\プレゼンテーション\ビューモデル\登録フォームビューモデル;

class 登録フォーム表示
{
    private $商品リポ;

    public function __construct(
        商品リポジトリインターフェース $商品リポ
    ) {
        $this->商品リポ = $商品リポ;
    }

    public function 実行(): 登録フォームビューモデル
    {
        $カテゴリ = $this->商品リポ->カテゴリを取得();
        return new 登録フォームビューモデル($カテゴリ);
    }
}
