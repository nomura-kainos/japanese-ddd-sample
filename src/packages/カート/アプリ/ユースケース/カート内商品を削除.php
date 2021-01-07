<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use カート\ドメイン\モデル\カートID;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use カート\ドメイン\モデル\カート内商品ID;

class カート内商品を削除
{
    public function __construct(
        private カートリポジトリインターフェース $カートリポ
    ) {
    }

    public function 実行(int $カートid, int $商品id)
    {
        $this->カートリポ->カート内商品を削除(new カートID($カートid), new カート内商品ID($商品id));
    }
}
