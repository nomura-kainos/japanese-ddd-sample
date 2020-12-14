<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use カート\ドメイン\モデル\カートドメインサービス;
use 共通\トランザクション\トランザクションインターフェース;

class カートに入れる
{
    private $トランザクション;
    private $カートドメインサービス;

    public function __construct(
        トランザクションインターフェース $トランザクション,
        カートドメインサービス $カートドメインサービス
    ) {
        $this->トランザクション = $トランザクション;
        $this->カートドメインサービス = $カートドメインサービス;
    }

    public function 実行(int $商品id, int $数量)
    {
        $this->トランザクション->スコープ(function () use ($商品id, $数量) {
            $this->カートドメインサービス->カートに入れる($商品id, $数量);
        });
    }
}
