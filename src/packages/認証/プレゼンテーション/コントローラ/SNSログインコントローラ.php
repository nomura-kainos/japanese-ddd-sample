<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 認証\アプリ\ユースケース\SNSログイン;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SNSログインコントローラ extends Controller
{
    public function __construct(private SNSログイン $SNSログイン)
    {
    }

    public function __invoke(string $SNS名): RedirectResponse
    {
        return $this->SNSログイン->実行($SNS名);
    }
}
