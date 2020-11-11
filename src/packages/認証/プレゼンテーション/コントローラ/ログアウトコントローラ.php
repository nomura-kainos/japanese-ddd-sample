<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 認証\アプリ\ユースケース\ログアウト;

class ログアウトコントローラ extends Controller
{
    private $ログアウト;

    public function __construct(ログアウト $ログアウト)
    {
        $this->ログアウト = $ログアウト;
    }

    public function __invoke(Request $リクエスト)
    {
        return $this->ログアウト->実行($リクエスト);
    }
}
