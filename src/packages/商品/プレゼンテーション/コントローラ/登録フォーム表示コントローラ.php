<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 商品\アプリ\ユースケース\登録フォーム表示;

class 登録フォーム表示コントローラ extends Controller
{
    private $登録フォーム表示;

    public function __construct(登録フォーム表示 $登録フォーム表示)
    {
        $this->登録フォーム表示 = $登録フォーム表示;
    }

    public function __invoke()
    {
        $ビュー = $this->登録フォーム表示->実行();

        return view('商品.登録', [
            '複数カテゴリ' => $ビュー->カテゴリコレクション(),
        ]);
    }
}
