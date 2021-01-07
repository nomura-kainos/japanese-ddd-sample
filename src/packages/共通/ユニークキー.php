<?php

declare(strict_types=1);

namespace 共通;

/**
 * @property-read int $値
 */
class ユニークキー
{
    use 値オブジェクト;

    final public function __construct(private $値)
    {
    }
}
