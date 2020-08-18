<?php

namespace 商品\アプリ\コントローラ;

use App\商品;
use App\Http\Controllers\Controller;

class 詳細コントローラ extends Controller
{
    public function __invoke(int $id)
    {
        $単品 = 商品::find($id);
        return view('商品.詳細', ['単品' => $単品]);
    }
}
