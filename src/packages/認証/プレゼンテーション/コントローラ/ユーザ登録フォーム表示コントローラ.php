<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 認証\アプリ\ユースケース\ユーザ登録フォーム表示;

class ユーザ登録フォーム表示コントローラ extends Controller
{
    private $ユーザ登録フォーム表示;

    public function __construct(ユーザ登録フォーム表示 $ユーザ登録フォーム表示)
    {
        $this->ユーザ登録フォーム表示 = $ユーザ登録フォーム表示;
    }

    public function __invoke()
    {
        return $this->ユーザ登録フォーム表示->実行();
    }
}
