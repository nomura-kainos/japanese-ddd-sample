<?php

declare(strict_types=1);

namespace 特集\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 特集\アプリ\ユースケース\登録;
use 特集\プレゼンテーション\フォームリクエスト\特集登録フォームリクエスト;

class 登録コントローラ extends Controller
{
    private $登録;

    public function __construct(登録 $登録)
    {
        $this->登録 = $登録;
    }

    public function __invoke(特集登録フォームリクエスト $リクエスト)
    {
        $this->登録->実行(
            $リクエスト->タイトル,
            $リクエスト->本文,
        );

        return redirect('/item/');
    }
}
