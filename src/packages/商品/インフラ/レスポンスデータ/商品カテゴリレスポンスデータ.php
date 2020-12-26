<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use 商品\インフラ\エロクアント\商品カテゴリエロクアント;

class 商品カテゴリレスポンスデータ
{
    private int $大カテゴリid;
    private string $大カテゴリ名;
    private int $小カテゴリid;
    private string $小カテゴリ名;

    public function __construct(商品カテゴリエロクアント $商品)
    {
        $this->大カテゴリid = $商品->大カテゴリid;
        $this->大カテゴリ名 = $商品->大カテゴリ名;
        $this->小カテゴリid = $商品->小カテゴリid;
        $this->小カテゴリ名 = $商品->小カテゴリ名;
    }

    public function 大カテゴリid(): int
    {
        return $this->大カテゴリid;
    }

    public function 大カテゴリ名(): string
    {
        return $this->大カテゴリ名;
    }

    public function 小カテゴリid(): int
    {
        return $this->小カテゴリid;
    }

    public function 小カテゴリ名(): string
    {
        return $this->小カテゴリ名;
    }
}
