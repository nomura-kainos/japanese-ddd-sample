<?php

namespace 商品\アプリ\ユースケース;

use Illuminate\Http\Request;
use 商品\ドメイン\モデル\商品;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 詳細表示
{
    private $商品リポ;

    public function __construct(
        商品リポジトリインターフェース $商品リポ
    )
    {
        $this->商品リポ = $商品リポ;
    }

    public function 実行(int $id):商品
    {
        $単品 = $this->商品リポ->IDで1件取得($id);

        return $単品;
    }
}
