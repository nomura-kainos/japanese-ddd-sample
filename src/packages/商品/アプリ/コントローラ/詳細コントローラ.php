<?php

namespace 商品\アプリ\コントローラ;

use App\Http\Controllers\Controller;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 詳細コントローラ extends Controller
{
    public function __construct(
        商品リポジトリインターフェース $商品リポ
    )
    {
        $this->商品リポ = $商品リポ;
    }

    public function __invoke(int $id)
    {
        $単品 = $this->商品リポ->IDで1件取得($id);
        return view('商品.詳細', ['単品' => $単品]);
    }
}
