<?php
declare(strict_types=1);

namespace 共通;

class エンティティ
{
    private ユニークキー $ユニークキー;

    public function ユニークキー(): int
    {
        return $this->ユニークキー->値();
    }

    protected function ユニークキーを設定する(ユニークキー $ユニークキー)
    {
        $this->ユニークキー = $ユニークキー;
    }

    public function 等しいか(self $エンティティ): bool
    {
        return $this->ユニークキー() === $エンティティ->ユニークキー();
    }
}
