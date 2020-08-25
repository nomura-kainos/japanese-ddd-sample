<?php
declare(strict_types=1);

namespace 商品\ドメイン\モデル;

class 商品ファクトリ
{
    private 商品リポジトリインターフェース $商品リポ;

    public function __construct(商品リポジトリインターフェース $商品リポ = null)
    {
        $this->商品リポ = $商品リポ;
    }

    public function 作成する(string $名前, レンタル料金 $レンタル料金)
    {
        $商品ID = $this->商品リポ->登録用に次の商品IDを取得する();
        return new 商品(
            商品ID::作成($商品ID->値()),
            $名前,
            $レンタル料金
        );
    }

    public function 再構成する(商品ID $id, string $名前, レンタル料金 $レンタル料金)
    {
        return new 商品(
            $id,
            $名前,
            $レンタル料金
        );
    }
}
