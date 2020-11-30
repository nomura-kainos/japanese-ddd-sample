<?php

declare(strict_types=1);

namespace 注文\インフラ\レスポンスデータ;

class 注文IDレスポンスデータ
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
