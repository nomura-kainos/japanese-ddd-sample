<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\レスポンスデータ\小カテゴリ;

use Illuminate\Support\Collection;

class 一覧表示クエリレスポンスデータ
{
    private $カテゴリコレクション;

    public function __construct(Collection $コレクション)
    {
        $カテゴリコレクション = $コレクション->map(function ($カテゴリ) {
            return new 小カテゴリレスポンスデータ($カテゴリ->小カテゴリid, $カテゴリ->名前);
        });

        $this->カテゴリコレクション = $カテゴリコレクション;
    }

    public function 取得(): Collection
    {
        return new Collection($this->カテゴリコレクション);
    }
}
