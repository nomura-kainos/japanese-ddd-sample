<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル\大カテゴリ;

use 商品カテゴリ\インフラ\レスポンスデータ\商品カテゴリIDレスポンスデータ;

interface 大カテゴリリポジトリインターフェース
{
    public function 登録用に次の商品カテゴリIDを取得する(): 商品カテゴリIDレスポンスデータ;

    public function 保存(大カテゴリ $カテゴリ);
}
