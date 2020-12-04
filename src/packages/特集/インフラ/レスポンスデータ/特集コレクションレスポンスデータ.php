<?php

declare(strict_types=1);

namespace 特集\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;

class 特集コレクションレスポンスデータ
{
    private $特集コレクション;

    public function __construct(Collection $コレクション)
    {
        $特集コレクション = $コレクション->map(function ($特集) {
            return new 特集レスポンスデータ($特集);
        });

        $this->特集コレクション = $特集コレクション;
    }

    public function 取得()
    {
        return $this->特集コレクション;
    }
}
