<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル\小カテゴリ;

use 共通\仕様\選択;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリID;

class 最後尾小カテゴリ仕様 implements 選択
{
    private $大カテゴリid;
    private $最新日付;

    public function __construct(
        商品カテゴリID $大カテゴリid
    ) {
        $this->大カテゴリid = $大カテゴリid;
    }

    public function 基準を設定する($複数カテゴリ)
    {
        $this->最新日付 = max(array_column($複数カテゴリ, 'created_at'));
    }

    public function 満たすか($小カテゴリ): bool
    {
        if ($this->大カテゴリid->値 != $小カテゴリ->大カテゴリid) {
            return false;
        }

        if ($this->最新日付 != $小カテゴリ->created_at) {
            return false;
        }

        return true;
    }
}
