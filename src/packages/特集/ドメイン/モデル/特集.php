<?php

declare(strict_types=1);

namespace 特集\ドメイン\モデル;

use 共通\エンティティ;
use 共通\集約ルート;

class 特集 extends エンティティ implements 集約ルート
{
    private 特集ID $id;
    private string $タイトル;
    private string $本文;

    public function __construct(特集ID $id, string $タイトル, string $本文)
    {
        parent::ユニークキーを設定する($id);
        $this->id = $id;
        $this->タイトル = $タイトル;
        $this->本文 = $本文;
    }

    public function id(): int
    {
        return $this->id->値;
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
