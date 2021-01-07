<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 認証\アプリ\ユースケース\入力してログイン;

class 入力してログインコントローラ extends Controller
{
    public function __construct(private 入力してログイン $入力してログイン)
    {
    }

    public function __invoke(Request $リクエスト)
    {
        return $this->入力してログイン->実行($リクエスト);
    }
}
