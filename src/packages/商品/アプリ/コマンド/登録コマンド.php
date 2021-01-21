<?php

declare(strict_types=1);

namespace 商品\アプリ\コマンド;

use 共通\配列コピー\ディープコピー;

class 登録コマンド
{
    public function __construct(
        private string $名前,
        private int $レンタル料金,
        private array $カテゴリ,
        private array $複数画像ファイル,
    ) {
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function レンタル料金(): int
    {
        return $this->レンタル料金;
    }

    public function カテゴリ(): array
    {
        return ディープコピー::実行($this->カテゴリ);
    }

    public function 複数画像ファイル(): array
    {
        return  ディープコピー::実行($this->複数画像ファイル);
    }

}
