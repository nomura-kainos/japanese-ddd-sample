<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use 認証\ドメイン\モデル\ユーザファクトリ;
use 認証\ドメイン\モデル\ユーザリポジトリインターフェース;
use 認証\ドメイン\モデル\ログインユーザインターフェース;

class ユーザ登録
{
    private $ユーザリポ;
    private $ユーザファクトリ;
    private $ログインユーザ;

    public function __construct(
        ユーザリポジトリインターフェース $ユーザリポ,
        ユーザファクトリ $ユーザファクトリ,
        ログインユーザインターフェース $ログインユーザ
    ) {
        $this->ユーザリポ = $ユーザリポ;
        $this->ユーザファクトリ = $ユーザファクトリ;
        $this->ログインユーザ = $ログインユーザ;
    }

    public function 実行(string $メール, string $パスワード)
    {
        $ユーザ = $this->ユーザファクトリ->作成する(
            $メール,
            $パスワード
        );

        $登録済みユーザ = $this->ユーザリポ->保存($ユーザ);

        $this->ログインユーザ::自動ログイン情報削除();
        $this->ログインユーザ::ユーザーIDのみで自動ログインする($登録済みユーザ->id());
    }
}
