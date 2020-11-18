<?php

namespace App\Http\Controllers;

use App\カート;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use 商品\インフラ\エロクアント\商品エロクアント;
use 認証\ドメイン\モデル\ログインユーザ;

class カートコントローラ extends Controller
{
    public function index(){
        $カート内商品 = カート::select(
            'カート.*',
            '商品.名前',
            '商品.レンタル料金 as 料金'
        )
            ->leftjoin('商品', '商品.id', '=', 'カート.商品id')
            ->where('カート.ユーザid', ログインユーザ::id())
            ->where('カート.注文済みか', '0')
            ->get();


        // カート内商品の価格を計算する
        $カート = $カート内商品->map(function ($単品) {
            $単品['総額'] = $単品->料金 * $単品->数量;
            return $単品;
        });

        return view('cart.index', [
            'カート' => $カート,
        ]);
    }

    public function add(Request $リクエスト){

        $カート = new カート();
        $テーブル名 = $カート->getTable();
        $新規採番ID = DB::table($テーブル名)->max('id') + 1;

        $カート->fill([
            'id' => $新規採番ID,
            'ユーザid' => ログインユーザ::id(),
            '商品id' => $リクエスト->get('商品id'),
            '数量' => $リクエスト->get('数量'),
        ]);

        $カート->save();

        return redirect('/cart');
    }

    public function remove($id){
        Auth::user()->カート
            ->where('id', $id)->firstOrFail()->delete();
        return redirect('/cart');
    }


}
