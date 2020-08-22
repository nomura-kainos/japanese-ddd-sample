<?php
declare(strict_types=1);

namespace 商品\ドメイン\モデル\基盤;

class ユニークキー
{
    protected $値;

    private function __construct(int $値)
    {
        $this->値 = $値;
    }

    public function 値(): int
    {
        return $this->値;
    }

    public function 等しいか(self $id): bool
    {
        return $this->値 === $id->値;
    }

    public static function 作成(int $value)
    {
        // インスタンスIDとインスタンスの値が全く同じものは、1つしか作れないように
        // staticにしている
        return new static($value);
    }
}
