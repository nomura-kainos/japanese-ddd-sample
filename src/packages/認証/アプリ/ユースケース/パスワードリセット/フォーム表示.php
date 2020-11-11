<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース\パスワードリセット;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class フォーム表示
{
    use ResetsPasswords;

    protected $redirectTo = '/item';

    public function 実行(Request $リクエスト, $トークン = null)
    {
        return $this->showResetForm($リクエスト, $トークン);
    }
}
