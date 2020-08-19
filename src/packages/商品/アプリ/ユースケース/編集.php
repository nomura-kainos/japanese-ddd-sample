<?php

namespace 商品\アプリ\ユースケース;

use Illuminate\Http\Request;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品;
use 商品\ドメイン\モデル\商品ID;
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
        $商品 = new 商品(
            商品ID::作成($リクエスト->id),
            $リクエスト->名前,
            レンタル料金::作成($リクエスト->レンタル料金)
        );

        $this->商品リポ->保存($商品);
    }
}
