<?php

declare(strict_types=1);

namespace 特集\プレゼンテーション\ビューモデル;

class 詳細ビューモデル
{
    public function __construct(
        private int $id,
        private string $タイトル,
        private string $本文
    ) {
    }

    public function id(): string
    {
        return (string)$this->id;
    }

    public function タイトル(): string
    {
        return $this->タイトル;
    }

    public function 本文(): string
    {
        return $this->本文;
    }
}
