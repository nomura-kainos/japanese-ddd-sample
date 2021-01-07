<?php

declare(strict_types=1);

namespace 商品カテゴリ\プレゼンテーション\コントローラ\大カテゴリ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 商品カテゴリ\アプリ\ユースケース\大カテゴリ\登録;

class 登録コントローラ extends Controller
{
    public function __construct(private 登録 $登録)
    {
    }

    public function __invoke(Request $リクエスト)
    {
        $this->登録->実行($リクエスト->名前);

        return redirect('/category/big');
    }
}
