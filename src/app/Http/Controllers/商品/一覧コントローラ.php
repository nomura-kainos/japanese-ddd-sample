<?php

namespace App\Http\Controllers\商品;

use App\Http\Controllers\Controller;

class 一覧コントローラ extends Controller
{
    public function __invoke()
    {
        return view('商品.一覧');
    }
}
