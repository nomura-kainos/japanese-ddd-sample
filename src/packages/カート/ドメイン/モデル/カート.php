<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\エンティティ;

class カート extends エンティティ
{

    private カートID $id;
    private ユーザID $ユーザid;

    public function __construct(カートID $id, ユーザID $ユーザid)
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
