<?php

declare(strict_types=1);

namespace 注文\アプリ\ユースケース;

use 注文\ドメイン\モデル\メールインターフェース;

class メールを送信する
{
    private $メール;

    public function __construct(メールインターフェース $メール)
    {
        $this->メール = $メール;
    }

    public function handle()
    {
        $this->メール->送信する();
    }
}
