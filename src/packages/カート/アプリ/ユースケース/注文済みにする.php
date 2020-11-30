<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use カート\ドメイン\モデル\カートリポ;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use カート\ドメイン\モデル\ユーザID;

class 注文済みにする
{
    private $カートリポ;

    public function __construct(カートリポジトリインターフェース $カートリポ)
    {
        $this->カートリポ = $カートリポ;
    }

    public function 実行(int $ユーザid)
    {
        $this->カートリポ->注文済みにする(new ユーザID($ユーザid));
    }
}
