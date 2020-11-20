<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use カート\ドメイン\モデル\カートドメインサービス;

class カートに入れる
{
    private $カートドメインサービス;

    public function __construct(カートドメインサービス $カートドメインサービス)
    {
        $this->カートドメインサービス = $カートドメインサービス;
    }

    public function 実行(int $商品id, int $数量)
    {
        $this->カートドメインサービス->カートに入れる($商品id, $数量);
    }
}
