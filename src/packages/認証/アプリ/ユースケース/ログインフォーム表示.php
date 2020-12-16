<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ログインフォーム表示
{
    use AuthenticatesUsers;

    public function 実行()
    {
        return $this->showLoginForm();
    }
}
