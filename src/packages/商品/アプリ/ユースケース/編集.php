<?php

namespace 商品\アプリ\ユースケース;

use Illuminate\Http\Request;
use 商品\ドメイン\モデル\商品;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 編集
{
    private $商品リポ;

    public function __construct(
        商品リポジトリインターフェース $商品リポ
    )
    {
        $this->商品リポ = $商品リポ;
    }

    public function 実行(Request $リクエスト)
    {
        $単品 = new 商品(
            $リクエスト->id,
            $リクエスト->名前,
            $リクエスト->価格
        );

        $this->商品リポ->保存($単品);
    }
}
