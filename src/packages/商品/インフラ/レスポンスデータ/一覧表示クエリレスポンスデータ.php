<?php

declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;
use 商品\インフラ\エロクアント\商品エロクアント;

class 一覧表示クエリレスポンスデータ
{

    private $商品コレクション;

    public function __construct(Collection $コレクション)
    {
        $商品コレクション = $コレクション->map(function ($商品) {
            return new 商品($商品);
        });

        $this->商品コレクション = $商品コレクション;
    }

    public function 取得()
    {
        return $this->商品コレクション;
    }
}

/*
 * phpでインナークラスが使えないため、privateにできない
 * このビューモデル以外で使わないこと
 */
class 商品
{
    private int $id;
    private string $名前;
    private int $レンタル料金;
    private string $カテゴリ名;

    public function __construct(商品エロクアント $商品)
    {
        $this->id = $商品->id;
        $this->名前 = $商品->名前;
        $this->レンタル料金 = $商品->レンタル料金;
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

    public function カテゴリ名(): string
    {
        return $this->カテゴリ名;
    }
}
