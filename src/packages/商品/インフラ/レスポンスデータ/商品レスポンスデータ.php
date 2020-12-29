<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use 商品\インフラ\エロクアント\商品エロクアント;

class 商品レスポンスデータ
{
    private int $id;
    private string $名前;
    private int $レンタル料金;
    private int $大カテゴリid;
    private int $小カテゴリid;

    public function __construct(商品エロクアント $商品)
    {
        $this->id = $商品->id;
        $this->名前 = $商品->名前;
        $this->レンタル料金 = $商品->レンタル料金;
        $this->大カテゴリid = $商品->大カテゴリid ?? 0;
        $this->小カテゴリid = $商品->小カテゴリid ?? 0;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function レンタル料金(): int
    {
        return $this->レンタル料金;
    }

    public function 大カテゴリid(): int
    {
        return $this->大カテゴリid;
    }

    public function 小カテゴリid(): int
    {
        return $this->小カテゴリid;
    }
}
