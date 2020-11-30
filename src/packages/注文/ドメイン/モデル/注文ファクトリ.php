<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

class 注文ファクトリ
{
    private ?注文リポジトリインターフェース $注文リポ;

    public function __construct(注文リポジトリインターフェース $注文リポ = null)
    {
        $this->注文リポ = $注文リポ;
    }

    public function 作成する(ユーザID $ユーザid)
    {
        $注文id = $this->注文リポ->登録用に次の注文IDを取得する();
        return new 注文(
            new 注文ID($注文id->値()),
            $ユーザid
        );
    }
}
