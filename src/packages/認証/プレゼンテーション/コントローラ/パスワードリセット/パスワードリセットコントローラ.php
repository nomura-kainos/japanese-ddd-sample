<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ\パスワードリセット;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 認証\アプリ\ユースケース\パスワードリセット\パスワードリセット;

class パスワードリセットコントローラ extends Controller
{
    private $パスワードリセット;

    public function __construct(パスワードリセット $パスワードリセット)
    {
        $this->パスワードリセット = $パスワードリセット;
    }

    public function __invoke(Request $リクエスト)
    {
        return $this->パスワードリセット->実行($リクエスト);
    }
}
