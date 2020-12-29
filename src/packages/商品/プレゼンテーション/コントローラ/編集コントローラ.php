<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 商品\アプリ\ユースケース\編集;

class 編集コントローラ extends Controller
{
    private $編集;

    public function __construct(編集 $編集)
    {
        $this->編集 = $編集;
    }

    public function __invoke(Request $リクエスト)
    {
        $カテゴリ= json_decode($リクエスト->カテゴリ,true);

        $this->編集->実行(
            (int)$リクエスト->id,
            $リクエスト->名前,
            $リクエスト->レンタル料金,
            $カテゴリ
        );

        return redirect('/item/');
    }
}
