<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル;

use 共通\値オブジェクト;

/**
 * @property-read int $値
 */
final class レンタル料金
{
    use 値オブジェクト;

    private int $値;

    final public function __construct(int $値)
    {
        $this->値 = $値;
    }
}
