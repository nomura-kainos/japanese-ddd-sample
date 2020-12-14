<?php

declare(strict_types=1);

namespace 特集\インフラ\リポジトリ;

use Illuminate\Support\Facades\DB;
use 特集\インフラ\エロクアント\タイトル画像エロクアント;
use 特集\ドメイン\モデル\アップロード\ファイル;
use 特集\ドメイン\モデル\特集ID;
use 特集\インフラ\レスポンスデータ\特集IDレスポンスデータ;
use 特集\ドメイン\モデル\特集;
use 特集\インフラ\エロクアント\特集エロクアント;
use 特集\ドメイン\モデル\特集リポジトリインターフェース;

class 特集リポジトリ implements 特集リポジトリインターフェース
{
    private $特集エロクアント;

    public function __construct(
        特集エロクアント $特集エロクアント
    ) {
        $this->特集エロクアント = $特集エロクアント;
    }

    public function 登録用に次の特集IDを取得する(): 特集IDレスポンスデータ
    {
        $テーブル名 = $this->特集エロクアント->getTable();
        $シーケンス名 = $テーブル名 . 'シーケンス';

        //idカラムに現在の値 + 1を挿入
        DB::table($シーケンス名)->update(['id' => DB::raw('LAST_INSERT_ID(id + 1)')]);

        $新規採番id = DB::table($シーケンス名)->selectRaw('LAST_INSERT_ID() as id')->first()->id;

        return new 特集IDレスポンスデータ($新規採番id);
    }

    public function 保存(特集 $特集)
    {
        $this->特集エロクアント::updateOrCreate(
            ['id' => $特集->id()],
            [
                'タイトル' => $特集->タイトル(),
                '本文' => $特集->本文(),
            ]
        );
    }

    public function 画像を保存(ファイル $ファイル, 特集ID $特集id)
    {
        $画像 = new タイトル画像エロクアント();
        $画像->fill([
            '特集id' => $特集id->値,
            'ファイル名' => $ファイル->保存前のファイル名を取得する(),
            'ファイルパス' => $ファイル->パスを取得する()
        ]);
        $画像->save();
    }
}
