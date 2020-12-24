<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\レスポンスデータ;

use 商品カテゴリ\インフラ\エロクアント\商品カテゴリエロクアント;

class 詳細表示クエリレスポンスデータ
{
    private $商品カテゴリレスポンス;

    public function __construct(商品カテゴリエロクアント $エロクアント)
    {
        $this->商品カテゴリレスポンス = new 商品カテゴリレスポンスデータ($エロクアント);
    }

    public function 取得()
    {
        return $this->商品カテゴリレスポンス;
    }
}
