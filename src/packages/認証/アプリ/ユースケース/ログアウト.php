<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class ログアウト
{
    use AuthenticatesUsers;

    protected $redirectTo = '/item';

    public function 実行(Request $リクエスト)
    {
        return $this->logout($リクエスト);
    }
}
