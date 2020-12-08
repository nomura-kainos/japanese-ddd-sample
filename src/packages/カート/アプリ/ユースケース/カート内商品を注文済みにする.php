<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use Illuminate\Contracts\Queue\ShouldQueue;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use カート\ドメイン\モデル\ユーザID;
use 注文\ドメイン\モデル\注文が確定された;

class カート内商品を注文済みにする implements ShouldQueue
{
    private $カートリポ;

    public function __construct(カートリポジトリインターフェース $カートリポ)
    {
        $this->カートリポ = $カートリポ;
    }

    public function handle(注文が確定された $ドメインイベント)
    {
        $this->カートリポ->注文済みにする(new ユーザID($ドメインイベント->ユーザid()));
    }
}
