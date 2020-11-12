<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use Laravel\Socialite\Contracts\User;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface ドライバインターフェース
{
    public function 認証ページヘリダイレクト(string $SNS名): RedirectResponse;
    public function アカウント取得(string $SNS名): User;
}
