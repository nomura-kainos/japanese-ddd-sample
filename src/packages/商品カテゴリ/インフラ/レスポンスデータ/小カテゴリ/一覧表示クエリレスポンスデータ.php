<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\レスポンスデータ\小カテゴリ;

use Illuminate\Support\Collection;
use 商品カテゴリ\インフラ\エロクアント\小カテゴリエロクアント;

class 一覧表示クエリレスポンスデータ
{
    private $カテゴリコレクション;

    public function __construct(Collection $コレクション)
    {
        $カテゴリコレクション = $コレクション->map(function (小カテゴリエロクアント $カテゴリ) {
            return new 小カテゴリレスポンスデータ($カテゴリ->小カテゴリid, $カテゴリ->名前);
        });

        $this->カテゴリコレクション = $カテゴリコレクション;
    }

    public function 取得(): Collection
    {
        return new Collection($this->カテゴリコレクション);
    }
}
