<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\値オブジェクト;

/**
 * @property-read int $値
 */
final class ユーザID
{
    use 値オブジェクト;

    final public function __construct(private int $値)
    {
    }
}
