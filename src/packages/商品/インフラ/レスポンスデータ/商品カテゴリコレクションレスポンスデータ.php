<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;

class 商品カテゴリコレクションレスポンスデータ
{
    private $商品コレクション;

    public function __construct(Collection $コレクション)
    {
        $商品コレクション = $コレクション->map(function ($商品) {
            return new 商品カテゴリレスポンスデータ($商品);
        });

        $this->商品コレクション = $商品コレクション;
    }

    public function 取得(): Collection
    {
        return $this->商品コレクション;
    }
}
