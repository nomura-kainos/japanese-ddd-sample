<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル\小カテゴリ;

use 共通\エンティティ;
use 共通\ユニークキー\複合ユニークキー;
use 共通\集約ルート;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリID;

class 小カテゴリ extends エンティティ implements 集約ルート
{
    public function __construct(
        private 商品カテゴリID $大カテゴリid,
        private 商品カテゴリID $小カテゴリid,
        private string $名前
    ) {
        parent::ユニークキーを設定する(new 複合ユニークキー($大カテゴリid, $小カテゴリid));
    }

    public function 大カテゴリid(): int
    {
        return $this->大カテゴリid->値;
    }

    public function 小カテゴリid(): int
    {
        return $this->小カテゴリid->値;
    }

    public function 名前(): string
    {
        return $this->名前;
    }
}
