<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 商品\アプリ\ユースケース\登録;
use 商品\プレゼンテーション\フォームリクエスト\商品登録フォームリクエスト;

class 登録コントローラ extends Controller
{
    public function __construct(private 登録 $登録)
    {
    }

    public function __invoke(商品登録フォームリクエスト $リクエスト)
    {
        $カテゴリ = json_decode($リクエスト->カテゴリ, $連想配列にするか？ = true);

        $this->登録->実行(
            $リクエスト->名前,
            (int)$リクエスト->レンタル料金,
            $カテゴリ,
            $リクエスト->file('複数商品画像')
        );

        return redirect('/item/');
    }
}
