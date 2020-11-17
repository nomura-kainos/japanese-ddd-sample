<?php

declare(strict_types=1);

namespace カート\インフラ\レスポンスデータ;

use カート\インフラ\エロクアント\カートエロクアント;

class カートレスポンスデータ
{
    private int $id;

    public function __construct(カートエロクアント $カート)
    {
        $this->id = $カート->id;
    }

    public function id(): int
    {
        return $this->id;
    }
}
