<?php

declare(strict_types=1);

namespace 認証\インフラ\レスポンスデータ;

class ユーザIDレスポンスデータ
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
