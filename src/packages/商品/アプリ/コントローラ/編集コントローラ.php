<?php

namespace 商品\アプリ\コントローラ;

use App\商品;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class 編集コントローラ extends Controller
{
    public function __invoke(Request $リクエスト)
    {
        $単品 = 商品::find($リクエスト->id);

        $単品->fill(
            [
                '名前' =>$リクエスト->名前,
                '価格' =>$リクエスト->価格,
            ]);

        $単品->save();

        return redirect('/item/');
    }
}
