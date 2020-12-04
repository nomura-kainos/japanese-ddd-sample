<?php

declare(strict_types=1);

namespace 特集\インフラ\レスポンスデータ;

class 特集IDレスポンスデータ
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
