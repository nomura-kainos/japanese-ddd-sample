<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

use 共通\値オブジェクト;

/**
 * @property-read int $値
 */
final class ユーザID
{
    use 値オブジェクト;

    private int $値;

    final public function __construct(int $値)
    {
        $this->値 = $値;
    }
}
