<?php

declare(strict_types=1);

namespace カート\インフラ\レスポンスデータ;

class カートIDレスポンスデータ
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
