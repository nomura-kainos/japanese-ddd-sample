<?php

declare(strict_types=1);

namespace 共通;

/**
 * @property-read int $値
 */
class ユニークキー
{
    use 値オブジェクト;

    private $値;

    final public function __construct($値)
    {
        $this->値 = $値;
    }
}
