<?php
declare(strict_types=1);

namespace 商品\ドメイン\モデル\基盤;

class エンティティ
{
    private ユニークキー $ユニークキー;

    public function __construct(ユニークキー $ユニークキー)
    {
        $this->ユニークキー = $ユニークキー;
    }

    public function ユニークキー(): ユニークキー
    {
        return $this->ユニークキー;
    }

    public function 等しいか(ユニークキー $ユニークキー): bool
    {
        return $this->ユニークキー->値() === $ユニークキー->値();
    }
}
