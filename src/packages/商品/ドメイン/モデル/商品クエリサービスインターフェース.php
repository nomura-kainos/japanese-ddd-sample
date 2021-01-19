<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル;

use 商品\インフラ\レスポンスデータ\商品IDレスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品カテゴリコレクションレスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品レスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品画像コレクションレスポンスデータ;

interface 商品クエリサービスインターフェース
{
    public function 登録用に次の商品IDを取得する(): 商品IDレスポンスデータ;

    public function IDで1件取得(商品ID $id): ?商品レスポンスデータ;

    public function カテゴリを取得(): 商品カテゴリコレクションレスポンスデータ;

    public function 画像を取得(商品ID $商品id): 商品画像コレクションレスポンスデータ;
}
