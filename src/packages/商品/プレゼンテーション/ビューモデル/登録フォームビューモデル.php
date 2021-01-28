<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル;

use 共通\配列コピー\ディープコピー;
use 商品\プレゼンテーション\ビューモデル\カテゴリ\カテゴリ階層分割済みコレクション;

class 登録フォームビューモデル
{
    public function __construct(
        private カテゴリ階層分割済みコレクション $カテゴリコレクション,
    ) {
    }

    public function カテゴリコレクション(): array
    {
        return ディープコピー::実行($this->カテゴリコレクション->取得());
    }
}
