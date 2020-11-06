<?php

declare(strict_types=1);

namespace 認証\インフラ\ドライバ;

use Laravel\Socialite\Facades\Socialite;
use 認証\ドメイン\モデル\ドライバインターフェース;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Laravel\Socialite\Contracts\User;

class SNSドライバ implements ドライバインターフェース
{
    public function 認証ページヘリダイレクト(string $SNS名): RedirectResponse
    {
        return Socialite::driver($SNS名)->redirect();
    }

    public function ユーザ情報取得(string $SNS名): User
    {
        return Socialite::driver($SNS名)->stateless()->user();
    }
}
