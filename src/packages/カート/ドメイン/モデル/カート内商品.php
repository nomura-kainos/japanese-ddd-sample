<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\エンティティ;
use 共通\ユニークキー\複合ユニークキー;

class カート内商品 extends エンティティ
{
    private int $数量;

    public function __construct(
        private カートID $カートid,
        private カート内商品ID $商品id,
        int $数量,
        private bool $注文済みか？ = false
    ) {
        parent::ユニークキーを設定する(new 複合ユニークキー($カートid, $商品id));
        $this->数量を変更する($数量);
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

    public function 注文済みか？(): bool
    {
        return $this->注文済みか？;
    }

    public function 数量を変更する(int $数量)
    {
        $this->数量 = $数量;
    }

    public function 注文済みにする()
    {
        $this->注文済みか？ = true;
    }
}
