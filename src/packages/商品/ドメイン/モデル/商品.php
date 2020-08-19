<?php

namespace 商品\ドメイン\モデル;

class 商品
{

    private int $id;
    private string $名前;
    private int $価格;

    public function __construct(int $id, string $名前, int $価格)
    {
        $this->id = $id;
        $this->名前 = $名前;
        $this->価格 = $価格;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function 価格(): string
    {
        return $this->価格;
    }

    /**
     * @param 商品 $商品
     * @return bool
     */
    public function equals(self $商品): bool
    {
        return $this->id()->equals($商品->id());
    }
}
