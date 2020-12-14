<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\リポジトリ;

use Illuminate\Support\Facades\DB;
use 商品カテゴリ\インフラ\レスポンスデータ\商品カテゴリレスポンスデータ;
use 商品カテゴリ\インフラ\レスポンスデータ\商品カテゴリIDレスポンスデータ;
use 商品カテゴリ\インフラ\レスポンスデータ\商品カテゴリコレクションレスポンスデータ;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリ;
use 商品カテゴリ\インフラ\エロクアント\商品カテゴリエロクアント;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリID;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリリポジトリインターフェース;

class 商品カテゴリリポジトリ implements 商品カテゴリリポジトリインターフェース
{
    private $商品カテゴリエロクアント;

    public function __construct(商品カテゴリエロクアント $商品カテゴリエロクアント)
    {
        $this->商品カテゴリエロクアント = $商品カテゴリエロクアント;
    }

    public function 登録用に次の商品カテゴリIDを取得する(): 商品カテゴリIDレスポンスデータ
    {
        $テーブル名 = $this->商品カテゴリエロクアント->getTable();
        $シーケンス名 = $テーブル名 . 'シーケンス';

        //idカラムに現在の値 + 1を挿入
        DB::table($シーケンス名)->update(['id' => DB::raw('LAST_INSERT_ID(id + 1)')]);

        $新規採番id = DB::table($シーケンス名)->selectRaw('LAST_INSERT_ID() as id')->first()->id;

        return new 商品カテゴリIDレスポンスデータ($新規採番id);
    }

    public function IDで1件取得(商品カテゴリID $id): ?商品カテゴリレスポンスデータ
    {
        $単品 = $this->商品カテゴリエロクアント::find($id->値);
        if ($単品 === null) {
            return null;
        }
        return new 商品カテゴリレスポンスデータ($単品);
    }

    public function 全件取得(): 商品カテゴリコレクションレスポンスデータ
    {
        $複数商品カテゴリ = $this->商品カテゴリエロクアント::all();
        return new 商品カテゴリコレクションレスポンスデータ($複数商品カテゴリ);
    }

    public function 保存(商品カテゴリ $商品カテゴリ)
    {
        $this->商品カテゴリエロクアント::updateOrCreate(
            ['id' => $商品カテゴリ->id()],
            [
                '名前' => $商品カテゴリ->名前(),
            ]
        );
    }
}
