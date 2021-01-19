<?php

declare(strict_types=1);

namespace カート\インフラ\レスポンスデータ;

use 共通\配列コピー\ディープコピー;

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
        return ディープコピー::実行($this->商品コレクション);
    }
}
