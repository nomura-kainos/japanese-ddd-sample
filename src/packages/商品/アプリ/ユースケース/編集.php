<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\ドメイン\モデル\カテゴリID;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品ID;
use 商品\ドメイン\モデル\商品ファクトリ;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 編集
{
    private $商品リポ;
    private $商品ファクトリ;

    public function __construct(商品リポジトリインターフェース $商品リポ, 商品ファクトリ $商品ファクトリ)
    {
        $this->商品リポ = $商品リポ;
        $this->商品ファクトリ = $商品ファクトリ;
    }

    public function 実行(int $商品id, string $名前, string $レンタル料金, int $カテゴリid)
    {
        $商品レスポンスデータ = $this->商品リポ->IDで1件取得(new 商品ID($商品id));
        $値段表記を消したレンタル料金 = (int)str_replace(',', '', $レンタル料金);

        $商品 = $this->商品ファクトリ->再構成する(
            new 商品ID($商品レスポンスデータ->id()),
            $名前,
            new レンタル料金($値段表記を消したレンタル料金),
            new カテゴリID($カテゴリid)
        );

        $this->商品リポ->保存($商品);
    }
}
