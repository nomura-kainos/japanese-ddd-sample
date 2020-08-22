<?php
declare(strict_types=1);

namespace 商品\インフラ\リポジトリ;

use 商品\インフラ\レスポンスデータ\商品レスポンスデータ;
use 商品\ドメイン\モデル\商品;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\ドメイン\モデル\商品コレクション;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 商品リポジトリ implements 商品リポジトリインターフェース
{
    private $商品エロクアント;

    public function __construct(商品エロクアント $商品エロクアント)
    {
        $this->商品エロクアント = $商品エロクアント;
    }

    /**
     * @param int $id
     * @return 商品レスポンスデータ
     */
    public function IDで1件取得(int $id):商品レスポンスデータ
    {
        $単品 = $this->商品エロクアント::find($id);
        return new 商品レスポンスデータ($単品);
    }

    /**
     * @return 商品コレクション
     */
    public function 全件取得():商品コレクション
    {
        $複数商品 = $this->商品エロクアント::all();
        return new 商品コレクション($複数商品);
    }

    /**
     * @return void
     */
    public function 保存(商品 $商品)
    {
        // 呼び出し元のメソッドで商品が存在するか検索されているかわからないため、再度検索する
        $単品 = $this->商品エロクアント::find($商品->id());
        if($単品->exists()){
            $単品->fill(
                [
                    '名前' => $商品->名前(),
                    'レンタル料金' => $商品->レンタル料金(),
                ],
            );
            $単品->save();

        }else {
            // 新規登録する
        }
    }
}
