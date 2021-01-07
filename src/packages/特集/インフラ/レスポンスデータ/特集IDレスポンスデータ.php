<?php

declare(strict_types=1);

namespace 特集\インフラ\レスポンスデータ;

class 特集IDレスポンスデータ
{
    public function __construct(private int $id)
    {
    }

    public function 値(): int
    {
        return $this->id;
    }
}
