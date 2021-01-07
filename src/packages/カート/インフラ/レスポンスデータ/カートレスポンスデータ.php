<?php

declare(strict_types=1);

namespace カート\インフラ\レスポンスデータ;

use カート\インフラ\エロクアント\カートエロクアント;

class カートレスポンスデータ
{
    public function __construct(private カートエロクアント $カート, private array $商品コレクション)
    {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function 商品コレクション(): array
    {
        return $this->商品コレクション;
    }
}
