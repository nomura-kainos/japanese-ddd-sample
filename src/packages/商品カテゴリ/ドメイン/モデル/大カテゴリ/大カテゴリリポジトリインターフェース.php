<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル\大カテゴリ;

interface 大カテゴリリポジトリインターフェース
{
    public function 保存(大カテゴリ $カテゴリ);
}
