<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル;

use Illuminate\Support\Collection;
use 商品\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;

class 一覧ビューモデル
{
    private $商品コレクション;

    public function __construct(一覧表示クエリレスポンスデータ $レスポンスデータ)
    {
        $詰め替え後のコレクション = $レスポンスデータ->取得()->map(function ($商品) {

            return new 商品(
                $商品->id(),
                $商品->名前(),
                $商品->レンタル料金(),
                $商品->カテゴリ名()
            );
        });

        $this->商品コレクション = $詰め替え後のコレクション;
    }

    public function 取得(): Collection
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

    public function __construct(int $id, string $名前, int $レンタル料金, string $カテゴリ名)
    {
        $this->id = $id;
        $this->名前 = $名前;
        $this->レンタル料金 = $レンタル料金;
        $this->カテゴリ名 = $カテゴリ名;
    }

    public function id(): string
    {
        return (string)$this->id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function レンタル料金(): string
    {
        return number_format($this->レンタル料金);
    }

    public function カテゴリ名(): string
    {
        return $this->カテゴリ名;
    }
}
