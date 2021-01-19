<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 商品\ドメイン\モデル\商品クエリサービスインターフェース;
use 商品\プレゼンテーション\ビューモデル\登録フォームビューモデル;

class 登録フォーム表示
{
    public function __construct(
        private 商品クエリサービスインターフェース $商品クエリ,
    ) {
    }

    public function 実行(): 登録フォームビューモデル
    {
        $カテゴリ = $this->商品クエリ->カテゴリを取得();
        return new 登録フォームビューモデル($カテゴリ);
    }
}
