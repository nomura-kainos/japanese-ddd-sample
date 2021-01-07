<?php

declare(strict_types=1);

namespace 注文\アプリ\ユースケース;

use 注文\ドメイン\モデル\メールインターフェース;

class メールを送信する
{
    public function __construct(private メールインターフェース $メール)
    {
    }

    public function handle()
    {
        $this->メール->送信する();
    }
}
