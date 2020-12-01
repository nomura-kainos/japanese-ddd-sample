<?php

declare(strict_types=1);

namespace 商品\インフラ\リポジトリ;

use Illuminate\Support\Facades\DB;
use 商品\インフラ\レスポンスデータ\商品IDレスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品レスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品コレクションレスポンスデータ;
use 商品\ドメイン\モデル\商品;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\ドメイン\モデル\商品ID;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 商品リポジトリ implements 商品リポジトリインターフェース
{
    private $商品エロクアント;

    public function __construct(商品エロクアント $商品エロクアント)
    {
        $this->商品エロクアント = $商品エロクアント;
    }

    public function 登録用に次の商品IDを取得する(): 商品IDレスポンスデータ
    {
        $テーブル名 = $this->商品エロクアント->getTable();
        $シーケンス名 = $テーブル名 . 'シーケンス';

        //idカラムに現在の値 + 1を挿入
        DB::table($シーケンス名)->update(['id' => DB::raw('LAST_INSERT_ID(id + 1)')]);

        $新規採番id = DB::table($シーケンス名)->selectRaw('LAST_INSERT_ID() as id')->first()->id;

        return new 商品IDレスポンスデータ($新規採番id);
    }

    public function IDで1件取得(商品ID $id): ?商品レスポンスデータ
    {
        $単品 = $this->商品エロクアント::find($id->値);
        if ($単品 === null) {
            return null;
        }
        return new 商品レスポンスデータ($単品);
    }

    public function 全件取得(): 商品コレクションレスポンスデータ
    {
        $複数商品 = $this->商品エロクアント::all();
        return new 商品コレクションレスポンスデータ($複数商品);
    }

    public function 保存(商品 $商品)
    {
        // 呼び出し元のメソッドで商品が存在するか検索されているかわからないため、再度検索する
        $単品 = $this->商品エロクアント::find($商品->id());

        // 商品が存在する
        if ($単品 !== null) {
            $単品->fill(
                [
                    '名前' => $商品->名前(),
                    'レンタル料金' => $商品->レンタル料金(),
                    'カテゴリid' => $商品->カテゴリid(),
                ],
            );
        } else {
            // 新規登録する
            $単品 = new 商品エロクアント();
            $単品->fill(
                [
                    'id' => $商品->id(),
                    '名前' => $商品->名前(),
                    'レンタル料金' => $商品->レンタル料金(),
                    'カテゴリid' => $商品->カテゴリid(),
                ],
            );
        }

        $単品->save();
    }
}
