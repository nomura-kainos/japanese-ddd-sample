<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\レスポンスデータ\小カテゴリ;

class 小カテゴリレスポンスデータ
{
    public function __construct(
        private int $id,
        private string $名前,
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }
}
