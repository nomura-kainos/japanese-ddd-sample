<?php

declare(strict_types=1);

namespace 特集\インフラ\レスポンスデータ;

use 特集\インフラ\エロクアント\特集エロクアント;

class 特集レスポンスデータ
{
    private int $id;
    private string $タイトル;
    private string $本文;

    public function __construct(特集エロクアント $特集)
    {
        $this->id = $特集->id;
        $this->タイトル = $特集->タイトル;
        $this->本文 = $特集->本文;
    }

    public function id(): int
    {
        return $this->id;
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
