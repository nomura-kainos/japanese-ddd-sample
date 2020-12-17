<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル;

use 商品カテゴリ\インフラ\レスポンスデータ\商品カテゴリIDレスポンスデータ;
use 商品カテゴリ\インフラ\レスポンスデータ\商品カテゴリレスポンスデータ;

interface 商品カテゴリリポジトリインターフェース
{
    public function 登録用に次の商品カテゴリIDを取得する(): 商品カテゴリIDレスポンスデータ;

    public function IDで1件取得(商品カテゴリID $id): ?商品カテゴリレスポンスデータ;

    public function 保存(商品カテゴリ $商品カテゴリ);
}
