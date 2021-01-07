<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル;

use 共通\値オブジェクト;

/**
 * @property-read int $大カテゴリid
 * @property-read int $小カテゴリid
 */
final class カテゴリ
{
    use 値オブジェクト;

    final public function __construct(
        private int $大カテゴリid,
        private int $小カテゴリid
    ) {
    }
}
