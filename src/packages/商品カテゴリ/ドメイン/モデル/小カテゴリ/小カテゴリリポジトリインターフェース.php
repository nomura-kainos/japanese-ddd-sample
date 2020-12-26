<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル\小カテゴリ;

use 共通\仕様\選択;
use 商品カテゴリ\インフラ\レスポンスデータ\小カテゴリ\小カテゴリレスポンスデータ;

interface 小カテゴリリポジトリインターフェース
{
    public function 仕様で取得(選択 $仕様): ?小カテゴリレスポンスデータ;

    public function 保存(小カテゴリ $カテゴリ);
}
