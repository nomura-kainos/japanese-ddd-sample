<?php

namespace 商品\アプリ\コントローラ;

use App\Http\Controllers\Controller;

class 一覧コントローラ extends Controller
{
    public function __invoke()
    {
        return view('商品.一覧');
    }
}
