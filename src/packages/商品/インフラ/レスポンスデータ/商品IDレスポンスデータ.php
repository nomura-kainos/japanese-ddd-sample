<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

class 商品IDレスポンスデータ
{

    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function 値(): int
    {
        return $this->id;
    }
}
