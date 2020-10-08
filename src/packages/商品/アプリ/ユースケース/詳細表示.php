<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\ドメイン\モデル\商品ID;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;
use 商品\プレゼンテーション\ビューモデル\詳細ビューモデル;

class 詳細表示
{
    private $商品リポ;

    public function __construct(商品リポジトリインターフェース $商品リポ)
    {
        $this->商品リポ = $商品リポ;
    }

    public function 実行(int $id): 詳細ビューモデル
    {
        $商品 = $this->商品リポ->IDで1件取得(new 商品ID($id));

        return new 詳細ビューモデル($商品->id(), $商品->名前(), $商品->レンタル料金(), $商品->カテゴリid());
    }
}
