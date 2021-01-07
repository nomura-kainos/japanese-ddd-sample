<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\レスポンスデータ;

class 商品カテゴリIDレスポンスデータ
{
    public function __construct(private int $id)
    {
    }

    public function 値(): int
    {
        return $this->id;
    }
}
