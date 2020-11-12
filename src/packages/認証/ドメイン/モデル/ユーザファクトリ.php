<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

class ユーザファクトリ
{
    private ?ユーザリポジトリインターフェース $ユーザリポ;

    public function __construct(ユーザリポジトリインターフェース $ユーザリポ = null)
    {
        $this->ユーザリポ = $ユーザリポ;
    }

    public function 作成する(string $名前, string $メール, ?string $パスワード)
    {
        $ユーザID = $this->ユーザリポ->登録用に次のユーザIDを取得する();

        return new ユーザ(
            new ユーザID($ユーザID->値()),
            $名前,
            $メール,
            $パスワード
        );
    }
}
