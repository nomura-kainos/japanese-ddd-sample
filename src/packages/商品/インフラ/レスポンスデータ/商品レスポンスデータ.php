<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use 商品\インフラ\エロクアント\商品エロクアント;

class 商品レスポンスデータ
{
    private int $id;
    private string $名前;
    private int $レンタル料金;
    private int $カテゴリid;
    private string $カテゴリ名;

    public function __construct(商品エロクアント $商品)
    {
        $this->id = $商品->id;
        $this->名前 = $商品->名前;
        $this->レンタル料金 = $商品->レンタル料金;
        $this->カテゴリid = $商品->カテゴリid ?? 0;
        $this->カテゴリ名 = $商品->カテゴリ名 ?? 'カテゴリ未所属';
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

    public function カテゴリid(): int
    {
        return $this->カテゴリid;
    }

    public function カテゴリ名(): string
    {
        return $this->カテゴリ名;
    }
}
