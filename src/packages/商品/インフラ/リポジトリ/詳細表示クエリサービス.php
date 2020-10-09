<?php

declare(strict_types=1);

namespace 商品\インフラ\リポジトリ;

use 商品\アプリ\ユースケース\詳細表示クエリサービスインターフェース;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\レスポンスデータ\商品レスポンスデータ;
use 商品\ドメイン\モデル\商品ID;

class 詳細表示クエリサービス implements 詳細表示クエリサービスインターフェース
{
    private $商品エロクアント;

    public function __construct(商品エロクアント $商品エロクアント)
    {
        $this->商品エロクアント = $商品エロクアント;
    }

    public function IDで1件取得(商品ID $id): ?商品レスポンスデータ
    {
        $単品 = $this->商品エロクアント::select(
            '商品.*',
            '商品カテゴリ.id as カテゴリid',
            '商品カテゴリ.名前 as カテゴリ名'
        )
            ->where('商品.id', '=', $id->値)
            ->leftjoin('商品カテゴリ', '商品カテゴリ.id', '=', '商品.カテゴリid')
            ->first();

        if ($単品 === null) {
            return null;
        }
        return new 商品レスポンスデータ($単品);
    }
}
