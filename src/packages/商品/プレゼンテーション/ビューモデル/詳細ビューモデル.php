<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル;

use Illuminate\Support\Collection;
use 商品\インフラ\レスポンスデータ\商品画像コレクションレスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品カテゴリコレクションレスポンスデータ;

class 詳細ビューモデル
{
    private int $id;
    private string $名前;
    private int $レンタル料金;
    private int $カテゴリid;
    private string $カテゴリ名;
    private 商品カテゴリコレクションレスポンスデータ $カテゴリコレクション;
    private 商品画像コレクションレスポンスデータ $画像コレクション;

    public function __construct(
        int $id,
        string $名前,
        int $レンタル料金,
        int $カテゴリid,
        string $カテゴリ名,
        商品カテゴリコレクションレスポンスデータ $カテゴリコレクション,
        商品画像コレクションレスポンスデータ $画像コレクション
    ) {
        $this->id = $id;
        $this->名前 = $名前;
        $this->レンタル料金 = $レンタル料金;
        $this->カテゴリid = $カテゴリid;
        $this->カテゴリ名 = $カテゴリ名;
        $this->カテゴリコレクション = $カテゴリコレクション;
        $this->画像コレクション = $画像コレクション;
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

    public function カテゴリid(): string
    {
        return (string)$this->カテゴリid;
    }

    public function カテゴリ名(): string
    {
        return $this->カテゴリ名;
    }

    public function カテゴリコレクション(): Collection
    {
        return $this->カテゴリコレクション->取得();
    }

    public function 画像コレクション(): Collection
    {
        return $this->画像コレクション->取得();
    }
}
