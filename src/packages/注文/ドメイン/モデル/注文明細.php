<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

use 共通\エンティティ;
use 共通\ユニークキー;

class 注文明細 extends エンティティ
{
    public function __construct(
        private 注文ID $id,
        private int $行番号,
        private 商品ID $商品id,
        private string $商品名,
        private int $数量,
        private int $総額
    ) {
        parent::ユニークキーを設定する(new ユニークキー($id->値 . $行番号));
    }

    public function id(): int
    {
        return $this->id->値;
    }

    public function 行番号(): int
    {
        return $this->行番号;
    }

    public function 商品id(): int
    {
        return $this->商品id->値;
    }

    public function 商品名(): string
    {
        return $this->商品名;
    }

    public function 数量(): int
    {
        return $this->数量;
    }

    public function 総額(): int
    {
        return $this->総額;
    }

    public function 連想配列(): array
    {
        return [
            '注文id' => $this->id(),
            '行番号' => $this->行番号(),
            '商品id' => $this->商品id(),
            '商品名' => $this->商品名(),
            '数量' => $this->数量(),
            '総額' => $this->総額(),
        ];
    }
}
