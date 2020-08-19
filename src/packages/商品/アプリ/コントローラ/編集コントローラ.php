<?php

namespace 商品\アプリ\コントローラ;

use 商品\インフラ\リポジトリ\商品リポジトリ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 商品\ドメイン\モデル\商品;

class 編集コントローラ extends Controller
{
    private $商品リポ;

    public function __construct(
        商品リポジトリ $商品リポ
    )
    {
        $this->商品リポ = $商品リポ;
    }

    public function __invoke(Request $リクエスト)
    {
        $単品 = new 商品(
            $リクエスト->id,
            $リクエスト->名前,
            $リクエスト->価格
        );

        $this->商品リポ->保存($単品);

        return redirect('/item/');
    }
}
