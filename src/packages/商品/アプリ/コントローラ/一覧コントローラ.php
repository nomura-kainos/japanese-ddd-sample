<?php

namespace 商品\アプリ\コントローラ;

use App\商品;
use App\Http\Controllers\Controller;

class 一覧コントローラ extends Controller
{
    public function __invoke()
    {
        $商品 = 商品::all();
        return view('商品.一覧', ['商品'=>$商品]);
    }
}
