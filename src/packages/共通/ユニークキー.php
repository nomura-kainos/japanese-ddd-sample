<?php
declare(strict_types=1);

namespace 共通;

class ユニークキー
{
    private int $値;

    final public function __construct(int $値)
    {
        $this->値 = $値;
    }

    final public function 値(): int
    {
        return $this->値;
    }
}
