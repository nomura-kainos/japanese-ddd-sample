<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\エンティティ;
use 共通\集約ルート;

class カート extends エンティティ implements 集約ルート
{
    private カートID $id;
    private ユーザID $ユーザid;
    private カート内商品 $商品;

    public function __construct(カートID $id, ユーザID $ユーザid, カート内商品 $商品)
    {
        parent::ユニークキーを設定する($id);
        $this->id = $id;
        $this->ユーザid = $ユーザid;
        $this->商品 = $商品;
    }

    public function id(): int
    {
        return $this->id->値;
    }

    public function ユーザid(): int
    {
        return $this->ユーザid->値;
    }

    public function 商品(): カート内商品
    {
        return $this->商品;
    }
}
