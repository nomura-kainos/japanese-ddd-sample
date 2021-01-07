<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use 認証\ドメイン\モデル\ドライバインターフェース;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SNSログイン
{
    public function __construct(private ドライバインターフェース $ドライバ)
    {
    }

    public function 実行(string $SNS名): RedirectResponse
    {
        return $this->ドライバ->認証ページヘリダイレクト($SNS名);
    }
}
