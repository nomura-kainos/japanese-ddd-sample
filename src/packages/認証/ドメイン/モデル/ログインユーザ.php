<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use Illuminate\Support\Facades\Auth;

class ログインユーザ extends Auth
{
    public static function ログイン済みか()
    {
        if (self::check() == null) {
            return false;
        }
        return true;
    }

    public static function 自動ログイン情報削除() {
        self::logout();
    }

    public static function ユーザーIDのみで自動ログインする(ユーザID $id) {
        $自動ログインの設定 = true;
        self::loginUsingId($id->値, $自動ログインの設定);
    }
}
