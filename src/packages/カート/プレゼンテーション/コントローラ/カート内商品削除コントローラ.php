<?php

declare(strict_types=1);

namespace カート\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use カート\アプリ\ユースケース\カート内商品を削除;

class カート内商品削除コントローラ extends Controller
{
    private $カート内商品を削除;

    public function __construct(カート内商品を削除 $カート内商品を削除)
    {
        $this->カート内商品を削除 = $カート内商品を削除;
    }

    public function __invoke(Request $リクエスト)
    {
        $this->カート内商品を削除->実行((int)$リクエスト->カートid, (int)$リクエスト->商品id);

        return redirect('/cart');
    }
}
