<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 商品\アプリ\ユースケース\登録;
use 商品\ドメイン\モデル\カテゴリID;
use 商品\ドメイン\モデル\レンタル料金;

class 登録コントローラ extends Controller
{
    private $登録;

    public function __construct(登録 $登録)
    {
        $this->登録 = $登録;
    }

    public function __invoke(Request $リクエスト)
    {
        $this->登録->実行(
            $リクエスト->名前,
            (int)$リクエスト->レンタル料金,
            (int)$リクエスト->カテゴリid
        );

        return redirect('/item/');
    }
}
