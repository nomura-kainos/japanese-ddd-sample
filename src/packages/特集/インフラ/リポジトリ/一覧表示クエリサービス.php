<?php

declare(strict_types=1);

namespace 特集\インフラ\リポジトリ;

use 特集\アプリ\ユースケース\一覧表示クエリサービスインターフェース;
use 特集\インフラ\エロクアント\特集エロクアント;
use 特集\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;

class 一覧表示クエリサービス implements 一覧表示クエリサービスインターフェース
{
    public function __construct(private 特集エロクアント $特集エロクアント)
    {
    }

    public function 全件取得(): 一覧表示クエリレスポンスデータ
    {
        $複数特集 = $this->特集エロクアント::select(
            '特集.id',
            '特集.タイトル',
            'タイトル画像.ファイルパス'
        )
            ->leftjoin('タイトル画像', 'タイトル画像.特集id', '=', '特集.id')
            ->get();

        return new 一覧表示クエリレスポンスデータ($複数特集);
    }
}
