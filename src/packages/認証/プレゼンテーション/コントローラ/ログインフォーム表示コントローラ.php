<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 認証\アプリ\ユースケース\ログインフォーム表示;

class ログインフォーム表示コントローラ extends Controller
{
    private $ログインフォーム表示;

    public function __construct(ログインフォーム表示 $ログインフォーム表示)
    {
        $this->ログインフォーム表示 = $ログインフォーム表示;
    }

    public function __invoke()
    {
        return $this->ログインフォーム表示->実行();
    }
}
