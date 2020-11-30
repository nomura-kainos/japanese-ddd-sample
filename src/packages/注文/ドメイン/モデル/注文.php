<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

use 共通\エンティティ;

class 注文 extends エンティティ
{
    private 注文ID $id;
    private ユーザID $ユーザid;
    private array $注文明細;

    public function __construct(注文ID $id, ユーザID $ユーザid, array $注文明細)
    {
        parent::ユニークキーを設定する($id);
        $this->id = $id;
        $this->ユーザid = $ユーザid;
        $this->注文明細 = $注文明細;
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
