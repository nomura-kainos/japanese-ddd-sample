<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル;

class 商品カテゴリファクトリ
{
    private ?商品カテゴリリポジトリインターフェース $商品カテゴリリポ;

    public function __construct(商品カテゴリリポジトリインターフェース $商品カテゴリリポ = null)
    {
        $this->商品カテゴリリポ = $商品カテゴリリポ;
    }

    public function 作成する(string $名前, レンタル料金 $レンタル料金)
    {
        $商品カテゴリID = $this->商品カテゴリリポ->登録用に次の商品カテゴリIDを取得する();
        return new 商品カテゴリ(
            new 商品カテゴリID($商品カテゴリID->値()),
            $名前
        );
    }

    public function 再構成する(商品カテゴリID $id, string $名前)
    {
        return new 商品カテゴリ(
            $id,
            $名前
        );
    }
}
