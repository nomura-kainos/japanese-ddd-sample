<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 認証\アプリ\ユースケース\ユーザ登録;
use 認証\プレゼンテーション\フォームリクエスト\ユーザ登録フォームリクエスト;

class ユーザ登録コントローラ extends Controller
{
    private $ユーザ登録;

    public function __construct(ユーザ登録 $ユーザ登録)
    {
        $this->ユーザ登録 = $ユーザ登録;
    }

    public function __invoke(ユーザ登録フォームリクエスト $リクエスト)
    {
        $this->ユーザ登録->実行($リクエスト);

        return redirect('/item');
    }
}
