<?php

declare(strict_types=1);

namespace 特集\インフラ\リポジトリ;

use 特集\アプリ\ユースケース\一覧表示クエリサービスインターフェース;
use 特集\インフラ\エロクアント\特集エロクアント;
use 特集\インフラ\レスポンスデータ\特集コレクションレスポンスデータ;

class 一覧表示クエリサービス implements 一覧表示クエリサービスインターフェース
{
    private $特集エロクアント;

    public function __construct(特集エロクアント $特集エロクアント)
    {
        $this->特集エロクアント = $特集エロクアント;
    }

    public function 全件取得(): 特集コレクションレスポンスデータ
    {
        $複数特集 = $this->特集エロクアント::select(
            '特集.id',
            '特集.タイトル'
        )->get();

        return new 特集コレクションレスポンスデータ($複数特集);
    }
}
