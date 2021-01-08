<?php

declare(strict_types=1);

namespace 特集\アプリ\ユースケース;

use 特集\ドメイン\モデル\特集ID;
use 特集\プレゼンテーション\ビューモデル\詳細ビューモデル;

class 詳細表示
{
    public function __construct(private 詳細表示クエリサービスインターフェース $詳細表示クエリサービス)
    {
    }

    public function 実行(int $id): 詳細ビューモデル
    {
        $特集 = $this->詳細表示クエリサービス->IDで1件取得(new 特集ID($id));

        return new 詳細ビューモデル($特集->id(), $特集->タイトル(), $特集->本文());
    }
}
