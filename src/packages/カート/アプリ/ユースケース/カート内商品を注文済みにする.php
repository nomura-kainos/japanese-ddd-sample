<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use カート\ドメイン\モデル\ユーザID;
use 共通\イベント履歴リポジトリ;
use 注文\ドメイン\モデル\注文が確定された;

class カート内商品を注文済みにする implements ShouldQueue
{
    use InteractsWithQueue;

    private $カートリポ;
    private $イベント履歴;

    public function __construct(カートリポジトリインターフェース $カートリポ)
    {
        $this->カートリポ = $カートリポ;
    }

    public function handle(注文が確定された $ドメインイベント)
    {
        $this->イベント履歴 = new イベント履歴リポジトリ((int)$this->job->getJobId(), $this);
        $this->イベント履歴->登録する('開始');

        $this->カートリポ->注文済みにする(new ユーザID($ドメインイベント->ユーザid()));

        $this->イベント履歴->登録する('完了');
    }

    public function failed()
    {
        $this->イベント履歴->登録する('失敗');
    }
}
