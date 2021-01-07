<?php

declare(strict_types=1);

namespace 認証\インフラ\レスポンスデータ;

class ユーザIDレスポンスデータ
{
    public function __construct(private int $id)
    {
    }

    public function 値(): int
    {
        return $this->id;
    }
}
