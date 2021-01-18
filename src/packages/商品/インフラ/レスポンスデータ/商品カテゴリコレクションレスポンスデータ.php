<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;
use 商品\インフラ\エロクアント\商品カテゴリエロクアント;

class 商品カテゴリコレクションレスポンスデータ
{
    private $商品コレクション;

    public function __construct(Collection $コレクション)
    {
        $商品コレクション = $コレクション->map(function (商品カテゴリエロクアント $商品) {
            return new 商品カテゴリレスポンスデータ($商品);
        });

        $this->商品コレクション = $商品コレクション;
    }

    public function 取得(): array
    {
        return (new Collection($this->商品コレクション))->toArray();
    }
}
