<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル;

use Illuminate\Support\Collection;
use 共通\配列コピー\ディープコピー;
use 商品\インフラ\レスポンスデータ\商品画像コレクションレスポンスデータ;

class 詳細ビューモデル
{
    private array $カテゴリコレクション;

    public function __construct(
        private int $id,
        private string $名前,
        private int $レンタル料金,
        private int $大カテゴリid,
        private int $小カテゴリid,
        カテゴリ階層分割済みコレクション $カテゴリコレクション,
        private 商品画像コレクションレスポンスデータ $画像コレクション
    ) {
        $this->カテゴリコレクション = $カテゴリコレクション->取得();
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

    public function 大カテゴリid(): string
    {
        return (string)$this->大カテゴリid;
    }

    public function 小カテゴリid(): string
    {
        return (string)$this->小カテゴリid;
    }

    public function カテゴリコレクション(): array
    {
        return ディープコピー::実行($this->カテゴリコレクション);
    }

    public function 画像コレクション(): Collection
    {
        return new Collection($this->画像コレクション->取得());
    }
}
