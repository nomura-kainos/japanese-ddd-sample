<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use Illuminate\Http\Request;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品ファクトリ;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 登録
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
        $商品ファクトリ = new 商品ファクトリ($this->商品リポ);

        $商品 = $商品ファクトリ->作成する(
            $リクエスト->名前,
            new レンタル料金((int)$リクエスト->レンタル料金));

        $this->商品リポ->保存($商品);
    }
}
