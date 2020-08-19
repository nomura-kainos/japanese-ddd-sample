<?php

namespace 商品\アプリ\コントローラ;

use App\Http\Controllers\Controller;
use 商品\アプリ\ユースケース\一覧表示;

class 一覧コントローラ extends Controller
{
    private $一覧表示;

    public function __construct(一覧表示 $一覧表示
    )
    {
        $this->一覧表示 = $一覧表示;
    }

    public function __invoke()
    {
        $商品 = $this->一覧表示->実行();

        return view('商品.一覧', ['商品' => $商品]);
    }
}
