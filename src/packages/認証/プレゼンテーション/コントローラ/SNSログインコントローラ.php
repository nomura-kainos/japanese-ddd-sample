<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 認証\アプリ\ユースケース\SNSログイン;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SNSログインコントローラ extends Controller
{
    private $SNSログイン;

    public function __construct(SNSログイン $SNSログイン)
    {
        $this->SNSログイン = $SNSログイン;
    }

    public function __invoke($SNS名): RedirectResponse
    {
        return $this->SNSログイン->実行($SNS名);
    }
}
