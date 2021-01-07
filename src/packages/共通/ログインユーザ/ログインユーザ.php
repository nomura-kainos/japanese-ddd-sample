<?php

declare(strict_types=1);

namespace 共通\ログインユーザ;

use Illuminate\Support\Facades\Auth;
use 認証\ドメイン\モデル\ログインユーザインターフェース as 認証ログインユーザインターフェース;

class ログインユーザ implements ログインユーザインターフェース, 認証ログインユーザインターフェース
{
    public static function id(): int
    {
        return Auth::id();
    }

    public static function ログイン済みか？(): bool
    {
        if (Auth::check() == null) {
            return false;
        }
        return true;
    }

    /*
     * ログイン情報を記憶しておく際に保存するcookie情報(remember_token)を削除する
     */
    public static function 自動ログイン情報を削除する()
    {
        Auth::logout();
    }

    public static function ログインする(int $ユーザid, bool $パスワードを保存する = true)
    {
        Auth::loginUsingId($ユーザid, $パスワードを保存する);
    }
}
