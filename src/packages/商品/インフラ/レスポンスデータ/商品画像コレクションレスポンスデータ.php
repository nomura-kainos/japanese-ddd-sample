<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;
use 商品\インフラ\エロクアント\商品画像エロクアント;

class 商品画像コレクションレスポンスデータ
{

    private $商品画像コレクション;

    public function __construct(Collection $コレクション)
    {
        $商品画像コレクション = $コレクション->map(function (商品画像エロクアント $画像) {
            return new 商品画像レスポンスデータ($画像);
        });

        $this->商品画像コレクション = $商品画像コレクション;
    }

    public function 取得(): Collection
    {
        return new Collection($this->商品画像コレクション);
    }
}
