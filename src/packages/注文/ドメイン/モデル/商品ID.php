<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

use 共通\バリューオブジェクト;

/**
 * @property-read int $値
 */
final class 商品ID
{
    use バリューオブジェクト;

    private int $値;

    final public function __construct(int $値)
    {
        $this->値 = $値;
    }
}
