<?php

declare(strict_types=1);

namespace 商品カテゴリ\アプリ\ユースケース\小カテゴリ;

use 商品カテゴリ\ドメイン\モデル\商品カテゴリID;
use 商品カテゴリ\プレゼンテーション\ビューモデル\小カテゴリ\一覧ビューモデル;

class 一覧表示
{
    private $一覧表示クエリサービス;

    public function __construct(一覧表示クエリサービスインターフェース $一覧表示クエリサービス)
    {
        $this->一覧表示クエリサービス = $一覧表示クエリサービス;
    }

    public function 実行(int $大カテゴリid): 一覧ビューモデル
    {
        $複数商品 = $this->一覧表示クエリサービス->全件取得(new 商品カテゴリID($大カテゴリid));

        return new 一覧ビューモデル($複数商品);
    }
}
