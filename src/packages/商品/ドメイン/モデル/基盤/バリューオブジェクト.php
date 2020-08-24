<?php
declare(strict_types=1);

namespace 商品\ドメイン\モデル\基盤;

class バリューオブジェクト
{
    private $値;

    private function __construct($値)
    {
        $this->値 = $値;
    }

    public function 値()
    {
        return $this->値;
    }

    public function 等しいか(self $値): bool
    {
        return $this->値 === $値;
    }

    public static function 作成($値)
    {
        // インスタンスIDとインスタンスの値が全く同じものは、1つしか作れないように
        // staticにしている
        return new static($値);
    }
}
