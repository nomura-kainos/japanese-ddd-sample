<?php

declare(strict_types=1);

namespace 注文\インフラ\レスポンスデータ;

class 注文IDレスポンスデータ
{
    public function __construct(private int $id)
    {
    }

    public function 値(): int
    {
        return $this->id;
    }
}
