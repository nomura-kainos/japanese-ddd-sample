<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル;

use 共通\配列コピー\ディープコピー;
use 商品\プレゼンテーション\ビューモデル\カテゴリ\カテゴリ階層分割済みコレクション;

class 登録フォームビューモデル
{
    private array $カテゴリコレクション;

    public function __construct(
        カテゴリ階層分割済みコレクション $カテゴリコレクション,
    ) {
        $this->カテゴリコレクション = $カテゴリコレクション->取得();
    }

    public function カテゴリコレクション(): array
    {
        return ディープコピー::実行($this->カテゴリコレクション);
    }
}
