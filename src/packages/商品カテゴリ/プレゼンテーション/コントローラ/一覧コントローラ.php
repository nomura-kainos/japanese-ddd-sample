<?php

declare(strict_types=1);

namespace 商品カテゴリ\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 商品カテゴリ\アプリ\ユースケース\一覧表示;

class 一覧コントローラ extends Controller
{
    private $一覧表示;

    public function __construct(一覧表示 $一覧表示)
    {
        $this->一覧表示 = $一覧表示;
    }

    public function __invoke()
    {
        $複数カテゴリ = $this->一覧表示->実行();

        return view('商品カテゴリ.一覧', ['複数カテゴリ' => $複数カテゴリ]);
    }
}
