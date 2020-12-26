<?php

declare(strict_types=1);

namespace 商品カテゴリ\プレゼンテーション\コントローラ\小カテゴリ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 商品カテゴリ\アプリ\ユースケース\小カテゴリ\登録;

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
            (int)$リクエスト->大カテゴリid,
            $リクエスト->名前
        );

        return redirect('/category/small/' . $リクエスト->大カテゴリid);
    }
}
