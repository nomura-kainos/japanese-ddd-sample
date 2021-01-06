<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\エンティティ;
use 共通\ユニークキー;

class カート内商品 extends エンティティ
{
    private カートID $カートid;
    private カート内商品ID $商品id;
    private int $数量;
    private bool $注文済みか;

    public function __construct(カートID $カートid, カート内商品ID $商品id, int $数量, bool $注文済みか = false)
    {
        parent::ユニークキーを設定する(new ユニークキー($カートid->値 . $商品id->値));
        $this->カートid = $カートid;
        $this->商品id = $商品id;
        $this->数量を変更する($数量);
        $this->注文済みか = $注文済みか;
    }

    public function カートid(): int
    {
        return $this->カートid->値;
    }

    public function 商品id(): int
    {
        return $this->商品id->値;
    }

    public function 数量(): int
    {
        return $this->数量;
    }

    public function 注文済みか(): bool
    {
        return $this->注文済みか;
    }

    public function 数量を変更する(int $数量)
    {
        $this->数量 = $数量;
    }
}
