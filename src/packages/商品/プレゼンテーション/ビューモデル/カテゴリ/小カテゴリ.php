<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル\カテゴリ;

class 小カテゴリ
{
    private string $名前;

    public function __construct(
        private int $大カテゴリid,
        private int $小カテゴリid,
        string $名前,
    ) {
        $this->名前 = '--' . $名前;
    }

    public function 大カテゴリid()
    {
        return $this->大カテゴリid;
    }

    public function 小カテゴリid()
    {
        return $this->小カテゴリid;
    }

    public function 名前()
    {
        return $this->名前;
    }
}
