<?php

declare(strict_types=1);

namespace 特集\プレゼンテーション\ビューモデル;

class 詳細ビューモデル
{
    private int $id;
    private string $タイトル;
    private string $本文;

    public function __construct(
        int $id,
        string $タイトル,
        string $本文
    ) {
        $this->id = $id;
        $this->タイトル = $タイトル;
        $this->本文 = $本文;
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
