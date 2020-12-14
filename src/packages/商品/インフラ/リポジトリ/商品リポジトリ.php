<?php

declare(strict_types=1);

namespace 商品\インフラ\リポジトリ;

use Illuminate\Support\Facades\DB;
use 商品\インフラ\エロクアント\商品画像エロクアント;
use 商品\インフラ\レスポンスデータ\商品IDレスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品レスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品コレクションレスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品画像コレクションレスポンスデータ;
use 商品\ドメイン\モデル\アップロード\ファイル;
use 商品\ドメイン\モデル\商品;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\ドメイン\モデル\商品ID;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 商品リポジトリ implements 商品リポジトリインターフェース
{
    private $商品エロクアント;
    private $商品画像エロクアント;

    public function __construct(
        商品エロクアント $商品エロクアント,
        商品画像エロクアント $商品画像エロクアント
    ) {
        $this->商品エロクアント = $商品エロクアント;
        $this->商品画像エロクアント = $商品画像エロクアント;
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
        $this->商品エロクアント::updateOrCreate(
            ['id' => $商品->id()],
            [
                '名前' => $商品->名前(),
                'レンタル料金' => $商品->レンタル料金(),
                'カテゴリid' => $商品->カテゴリid(),
            ]
        );
    }

    public function 画像を保存(ファイル $ファイル, 商品ID $商品id)
    {
        $画像 = new 商品画像エロクアント();
        $画像->fill([
            '商品id' => $商品id->値,
            'ファイル名' => $ファイル->保存前のファイル名を取得する(),
            'ファイルパス' => $ファイル->パスを取得する()
        ]);
        $画像->save();
    }

    public function 画像を取得(商品ID $商品id): 商品画像コレクションレスポンスデータ
    {
        $複数画像 = $this->商品画像エロクアント::where('商品id', $商品id->値)->get();
        return new 商品画像コレクションレスポンスデータ($複数画像);
    }
}
