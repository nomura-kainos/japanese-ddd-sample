<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use Illuminate\Foundation\Auth\RegistersUsers;

class ユーザ登録フォーム表示
{
    use RegistersUsers;

    public function 実行()
    {
        return $this->showRegistrationForm();
    }
}
