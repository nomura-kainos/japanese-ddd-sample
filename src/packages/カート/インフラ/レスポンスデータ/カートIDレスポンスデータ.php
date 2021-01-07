<?php

declare(strict_types=1);

namespace カート\インフラ\レスポンスデータ;

class カートIDレスポンスデータ
{
    public function __construct(private int $id)
    {
    }

    public function 値(): int
    {
        return $this->id;
    }
}
