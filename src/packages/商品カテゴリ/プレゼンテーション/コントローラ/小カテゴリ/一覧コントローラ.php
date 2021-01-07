<?php

declare(strict_types=1);

namespace 商品カテゴリ\プレゼンテーション\コントローラ\小カテゴリ;

use App\Http\Controllers\Controller;
use 商品カテゴリ\アプリ\ユースケース\小カテゴリ\一覧表示;

class 一覧コントローラ extends Controller
{
    public function __construct(private 一覧表示 $一覧表示)
    {
    }

    public function __invoke(string $大カテゴリid)
    {
        $複数小カテゴリ = $this->一覧表示->実行((int)$大カテゴリid);

        return view('商品カテゴリ.小カテゴリ.一覧', [
            '複数小カテゴリ' => $複数小カテゴリ,
            '大カテゴリid' => $大カテゴリid,
        ]);
    }
}
