<?php

namespace 商品\アプリ\コントローラ;

use App\Http\Controllers\Controller;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 一覧コントローラ extends Controller
{
    private $商品リポ;

    public function __construct(
        商品リポジトリインターフェース $商品リポ
    )
    {
        $this->商品リポ = $商品リポ;
    }

    public function __invoke()
    {
        $商品 = $this->商品リポ->全件取得();
        return view('商品.一覧', ['商品' => $商品]);
    }
}
