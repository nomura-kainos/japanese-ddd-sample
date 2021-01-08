<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

use 共通\エンティティ;
use 共通\ユニークキー\単一ユニークキー;
use 共通\集約ルート;

class 注文 extends エンティティ implements 集約ルート
{
    public function __construct(
        private 注文ID $id,
        private ユーザID $ユーザid,
        private array $注文明細
    ) {
        parent::ユニークキーを設定する($id);
    }

    public function id(): int
    {
        return $this->id->値;
    }

    public function ユーザid(): int
    {
        return $this->ユーザid->値;
    }

    public function 注文明細(): array
    {
        return $this->注文明細;
    }
}
