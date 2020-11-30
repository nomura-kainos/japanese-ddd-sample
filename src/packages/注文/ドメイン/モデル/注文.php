<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

use 共通\エンティティ;

class 注文 extends エンティティ
{
    private 注文ID $id;
    private ユーザID $ユーザid;

    public function __construct(注文ID $id, ユーザID $ユーザid)
    {
        parent::ユニークキーを設定する($id);
        $this->id = $id;
        $this->ユーザid = $ユーザid;
    }

    public function id(): int
    {
        return $this->id->値;
    }

    public function ユーザid(): int
    {
        return $this->ユーザid->値;
    }
}
