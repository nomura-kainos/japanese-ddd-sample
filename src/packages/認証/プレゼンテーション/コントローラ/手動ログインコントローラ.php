<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 認証\アプリ\ユースケース\手動ログイン;

class 手動ログインコントローラ extends Controller
{
    private $手動ログイン;

    public function __construct(手動ログイン $手動ログイン)
    {
        $this->手動ログイン = $手動ログイン;
    }

    public function __invoke(Request $リクエスト)
    {
        return $this->手動ログイン->実行($リクエスト);
    }
}
