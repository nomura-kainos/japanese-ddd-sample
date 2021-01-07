<?php

declare(strict_types=1);

namespace カート\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use カート\アプリ\ユースケース\カートに入れる;

class カートに入れるコントローラ extends Controller
{
    public function __construct(private カートに入れる $カートに入れる)
    {
    }

    public function __invoke(Request $リクエスト)
    {
        $this->カートに入れる->実行((int)$リクエスト->商品id, (int)$リクエスト->数量);

        return redirect('/cart/');
    }
}
