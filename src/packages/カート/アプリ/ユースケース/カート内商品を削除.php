<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use カート\ドメイン\モデル\カートドメインサービス;

class カート内商品を削除
{
    private $カートドメインサービス;

    public function __construct(カートドメインサービス $カートドメインサービス)
    {
        $this->カートドメインサービス = $カートドメインサービス;
    }

    public function 実行(int $カートid, int $商品id)
    {
        $this->カートドメインサービス->カート内商品を削除($カートid, $商品id);
    }
}
