<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use 認証\ドメイン\モデル\ユーザファクトリ;
use 認証\ドメイン\モデル\ユーザリポジトリインターフェース;

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
            $リクエスト->input('name'),
            $リクエスト->input('email'),
            $リクエスト->input('password')
        );

        $登録済みユーザ = $this->ユーザリポ->保存($ユーザ);

        $this->ユーザのログイン情報削除();
        Auth::loginUsingId($登録済みユーザ->id(), true);
    }

    private function ユーザのログイン情報削除() {
        Auth::logout();
    }
}
