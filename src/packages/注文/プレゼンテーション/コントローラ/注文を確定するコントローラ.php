<?php

declare(strict_types=1);

namespace 注文\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 注文\アプリ\ユースケース\注文を確定する;

class 注文を確定するコントローラ extends Controller
{
    private $注文を確定する;

    public function __construct(注文を確定する $注文を確定する)
    {
        $this->注文を確定する = $注文を確定する;
    }

    public function __invoke(Request $リクエスト)
    {
        $this->注文を確定する->実行($リクエスト->商品);

        return redirect('/cart/ordered');
    }
}
