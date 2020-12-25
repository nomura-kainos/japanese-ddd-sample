<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\レスポンスデータ\大カテゴリ;

use 商品カテゴリ\インフラ\エロクアント\大カテゴリエロクアント;

class 商品カテゴリレスポンスデータ
{
    private int $id;
    private string $名前;

    public function __construct(大カテゴリエロクアント $カテゴリ)
    {
        $this->id = $カテゴリ->id;
        $this->名前 = $カテゴリ->名前;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }
}
