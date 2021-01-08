<?php

declare(strict_types=1);

namespace カート\インフラ\レスポンスデータ;

class カートレスポンスデータ
{
    public function __construct(
        private int $id,
        private array $商品コレクション
    ) {
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
