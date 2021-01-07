<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\ログインユーザ\ログインユーザインターフェース as 共通ログインユーザインターフェース;

interface ログインユーザインターフェース extends 共通ログインユーザインターフェース
{
    public static function ログイン済みか？(): bool;

    /*
     * ログイン情報を記憶しておく際に保存するcookie情報(remember_token)を削除する
     */
    public static function 自動ログイン情報を削除する();

    public static function ログインする(int $ユーザid, bool $パスワードを保存する = true);
}
