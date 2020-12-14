<?php

declare(strict_types=1);

namespace 共通\ID採番;

interface ID採番インターフェース
{
    public function 連番を発行する(string $テーブル名): int;
}
