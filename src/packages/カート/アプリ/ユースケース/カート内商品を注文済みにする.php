<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use カート\ドメイン\モデル\カートID;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use カート\ドメイン\モデル\ユーザID;
use カート\ドメイン\モデル\最新カート仕様;
use 共通\イベント履歴\イベント履歴リポジトリ;
use 注文\ドメイン\モデル\注文が確定された時;

class カート内商品を注文済みにする implements ShouldQueue
{
    use InteractsWithQueue;

    private $カートリポ;
    private $イベント履歴;

    public function __construct(カートリポジトリインターフェース $カートリポ)
    {
        $this->カートリポ = $カートリポ;
    }

    public function handle(注文が確定された時 $ドメインイベント)
    {
        $this->イベント履歴 = new イベント履歴リポジトリ((int)$this->job->getJobId(), $this);
        $this->イベント履歴->登録する('開始');

        $ユーザid = new ユーザID($ドメインイベント->ユーザid());
        $最新カート = $this->カートリポ->仕様で取得(new 最新カート仕様($ユーザid));
        $this->カートリポ->注文済みにする(new カートID($最新カート->id()));

        $this->イベント履歴->登録する('完了');
    }

    public function failed()
    {
        $this->イベント履歴->登録する('失敗');
    }
}
