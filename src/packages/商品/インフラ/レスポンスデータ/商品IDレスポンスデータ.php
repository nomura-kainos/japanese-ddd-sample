<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

class 商品IDレスポンスデータ
{
    public function __construct(private int $id)
    {
    }

    public function 値(): int
    {
        return $this->id;
    }
}
