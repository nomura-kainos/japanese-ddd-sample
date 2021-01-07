<?php

declare(strict_types=1);

namespace カート\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use カート\アプリ\ユースケース\一覧表示;

class 一覧コントローラ extends Controller
{
    public function __construct(private 一覧表示 $一覧表示)
    {
    }

    public function __invoke()
    {
        $カート内複数商品 = $this->一覧表示->実行();

        return view('カート.一覧', ['カート内複数商品' => $カート内複数商品]);
    }
}
