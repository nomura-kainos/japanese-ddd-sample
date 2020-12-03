<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\ドメイン\モデル\商品ID;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;
use 商品\プレゼンテーション\ビューモデル\詳細ビューモデル;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリリポジトリインターフェース;

class 詳細表示
{
    private $詳細表示クエリサービス;
    private $商品カテゴリリポ;
    private $商品リポ;

    public function __construct(
        詳細表示クエリサービスインターフェース $詳細表示クエリサービス,
        商品カテゴリリポジトリインターフェース $商品カテゴリリポ,
        商品リポジトリインターフェース $商品リポ
    ){
        $this->詳細表示クエリサービス = $詳細表示クエリサービス;
        $this->商品カテゴリリポ = $商品カテゴリリポ;
        $this->商品リポ = $商品リポ;
    }

    public function 実行(int $id): 詳細ビューモデル
    {
        $商品 = $this->詳細表示クエリサービス->IDで1件取得(new 商品ID($id));
        $カテゴリ = $this->商品カテゴリリポ->全件取得();
        $商品画像 = $this->商品リポ->画像を取得(new 商品ID($商品->id()));

        return new 詳細ビューモデル($商品->id(), $商品->名前(), $商品->レンタル料金(), $商品->カテゴリid(), $商品->カテゴリ名(), $カテゴリ, $商品画像);
    }
}
