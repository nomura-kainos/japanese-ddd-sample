<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 認証\アプリ\ユースケース\手動ログインフォーム表示;

class 手動ログインフォーム表示コントローラ extends Controller
{
    private $手動ログインフォーム表示;

    public function __construct(手動ログインフォーム表示 $手動ログインフォーム表示)
    {
        $this->手動ログインフォーム表示 = $手動ログインフォーム表示;
    }

    public function __invoke()
    {
        return $this->手動ログインフォーム表示->実行();
    }
}
