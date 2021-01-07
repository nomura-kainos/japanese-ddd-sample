<?php

declare(strict_types=1);

namespace 商品\インフラ\リポジトリ;

use 商品\アプリ\ユースケース\一覧表示クエリサービスインターフェース;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;

class 一覧表示クエリサービス implements 一覧表示クエリサービスインターフェース
{
    public function __construct(private 商品エロクアント $商品エロクアント)
    {
    }

    public function 全件取得(): 一覧表示クエリレスポンスデータ
    {
        $複数商品 = $this->商品エロクアント::select(
            '商品.*',
            '小カテゴリ.名前 as カテゴリ名'
        )
            ->leftjoin('小カテゴリ', function ($join) {
                $join->on('小カテゴリ.大カテゴリid', '=', '商品.大カテゴリid')
                     ->on('小カテゴリ.小カテゴリid', '=', '商品.小カテゴリid');
            })->get();

        return new 一覧表示クエリレスポンスデータ($複数商品);
    }
}
