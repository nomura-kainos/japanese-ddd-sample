<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use 認証\ドメイン\モデル\ドライバインターフェース;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SNSログイン
{
    private $ドライバ;

    public function __construct(ドライバインターフェース $ドライバ)
    {
        $this->ドライバ = $ドライバ;
    }

    public function 実行($SNS名): RedirectResponse
    {
        return $this->ドライバ->認証ページヘリダイレクト($SNS名);
    }
}
