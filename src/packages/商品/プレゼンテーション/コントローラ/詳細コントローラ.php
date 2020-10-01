<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 商品\アプリ\ユースケース\詳細表示;

class 詳細コントローラ extends Controller
{
    private $詳細表示;

    public function __construct(
        詳細表示 $詳細表示
    )
    {
        $this->詳細表示 = $詳細表示;
    }

    public function __invoke(int $id)
    {
        $商品 = $this->詳細表示->実行($id);

        return view('商品.詳細', ['商品' => $商品]);
    }
}
