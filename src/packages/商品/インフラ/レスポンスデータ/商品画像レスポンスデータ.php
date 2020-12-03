<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use 商品\インフラ\エロクアント\商品画像エロクアント;

class 商品画像レスポンスデータ
{
    private string $ファイルパス;

    public function __construct(商品画像エロクアント $商品画像)
    {
        $this->ファイルパス = $商品画像->ファイルパス;
    }

    public function ファイルパス(): string
    {
        return $this->ファイルパス;
    }
}
