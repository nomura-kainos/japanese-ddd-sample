<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ\パスワードリセット;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 認証\アプリ\ユースケース\パスワードリセット\フォーム表示;

class フォーム表示コントローラ extends Controller
{
    private $フォーム表示;

    public function __construct(フォーム表示 $フォーム表示)
    {
        $this->フォーム表示 = $フォーム表示;
    }

    public function __invoke(Request $リクエスト, $トークン = null)
    {
        return $this->フォーム表示->実行($リクエスト, $トークン);
    }
}
