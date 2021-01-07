<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 認証\アプリ\ユースケース\ログアウト;

class ログアウトコントローラ extends Controller
{
    public function __construct(private ログアウト $ログアウト)
    {
    }

    public function __invoke(Request $リクエスト)
    {
        return $this->ログアウト->実行($リクエスト);
    }
}
