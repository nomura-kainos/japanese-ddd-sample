<?php

declare(strict_types=1);

namespace 共通\ユニークキー;

use 共通\値オブジェクト;

/**
 * @property-read $値
 */
class 単一ユニークキー implements ユニークキー
{
    use 値オブジェクト;

    final public function __construct(private $値)
    {
    }
}
