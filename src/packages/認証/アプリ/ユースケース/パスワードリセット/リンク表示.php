<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース\パスワードリセット;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class リンク表示
{
    use SendsPasswordResetEmails;

    public function 実行()
    {
        return $this->showLinkRequestForm();
    }
}
