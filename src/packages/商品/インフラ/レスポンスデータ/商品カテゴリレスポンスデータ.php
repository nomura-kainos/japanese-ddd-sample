<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use 商品\インフラ\エロクアント\商品カテゴリエロクアント;

class 商品カテゴリレスポンスデータ
{
    private int $id;
    private string $名前;

    public function __construct(商品カテゴリエロクアント $商品)
    {
        $this->id = $商品->id;
        $this->名前 = $商品->名前;
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
