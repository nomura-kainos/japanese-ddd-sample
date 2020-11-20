<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\ドメイン\モデル\カテゴリID;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品ファクトリ;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 登録
{
    private $商品リポ;
    private $商品ファクトリ;

    public function __construct(商品リポジトリインターフェース $商品リポ, 商品ファクトリ $商品ファクトリ)
    {
        $this->商品リポ = $商品リポ;
        $this->商品ファクトリ = $商品ファクトリ;
    }

    public function 実行(string $名前, int $レンタル料金, int $カテゴリid)
    {
        $商品 = $this->商品ファクトリ->作成する(
            $名前,
            new レンタル料金($レンタル料金),
            new カテゴリID($カテゴリid)
        );

        $this->商品リポ->保存($商品);
    }
}
