<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル;

use 共通\バリューオブジェクト;

/**
 * @property-read int $大カテゴリid
 * @property-read int $小カテゴリid
 */
final class カテゴリ
{
    use バリューオブジェクト;

    private int $大カテゴリid;
    private int $小カテゴリid;

    final public function __construct(int $大カテゴリid, int $小カテゴリid)
    {
        $this->大カテゴリid = $大カテゴリid;
        $this->小カテゴリid = $小カテゴリid;
    }
}
