<?php

declare(strict_types=1);

namespace 共通;

/**
 * @property-read int $値
 */
class ユニークキー
{
    use バリューオブジェクト;

    private int $値;

    final public function __construct(int $値)
    {
        $this->値 = $値;
    }
}
