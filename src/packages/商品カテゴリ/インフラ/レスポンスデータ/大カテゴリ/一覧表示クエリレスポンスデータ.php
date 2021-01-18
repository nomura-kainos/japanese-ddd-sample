<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\レスポンスデータ\大カテゴリ;

use Illuminate\Support\Collection;
use 商品カテゴリ\インフラ\エロクアント\大カテゴリエロクアント;

class 一覧表示クエリレスポンスデータ
{
    private $カテゴリコレクション;

    public function __construct(Collection $コレクション)
    {
        $カテゴリコレクション = $コレクション->map(function (大カテゴリエロクアント $カテゴリ) {
            return new 商品カテゴリレスポンスデータ($カテゴリ);
        });

        $this->カテゴリコレクション = $カテゴリコレクション;
    }

    public function 取得(): Collection
    {
        return new Collection($this->カテゴリコレクション);
    }
}
