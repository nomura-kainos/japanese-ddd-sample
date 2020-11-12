<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use Illuminate\Http\Request;
use 認証\ドメイン\モデル\ユーザID;
use 認証\ドメイン\モデル\ユーザファクトリ;
use 認証\ドメイン\モデル\ユーザリポジトリインターフェース;
use 認証\ドメイン\モデル\ログインユーザ;

class ユーザ登録
{
    private $ユーザリポ;
    private $ユーザファクトリ;

    public function __construct(ユーザリポジトリインターフェース $ユーザリポ, ユーザファクトリ $ユーザファクトリ)
    {
        $this->ユーザリポ = $ユーザリポ;
        $this->ユーザファクトリ = $ユーザファクトリ;
    }

    public function 実行(Request $リクエスト)
    {
        $ユーザ = $this->ユーザファクトリ->作成する(
            $リクエスト->input('email'),
            $リクエスト->input('password')
        );

        $登録済みユーザ = $this->ユーザリポ->保存($ユーザ);

        ログインユーザ::自動ログイン情報削除();
        ログインユーザ::ユーザーIDのみで自動ログインする(new ユーザID($登録済みユーザ->id()));
    }
}
