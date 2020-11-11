<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース\パスワードリセット;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class リセット用メール送信
{
    use SendsPasswordResetEmails;

    public function 実行(Request $リクエスト)
    {
        return $this->sendResetLinkEmail($リクエスト);
    }
}
