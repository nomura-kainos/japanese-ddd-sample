<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

class カートファクトリ
{
    private ?カートリポジトリインターフェース $カートリポ;

    public function __construct(カートリポジトリインターフェース $カートリポ = null)
    {
        $this->カートリポ = $カートリポ;
    }

    public function 作成する(ユーザID $ユーザid)
    {
        $カートid = $this->カートリポ->登録用に次のカートIDを取得する();
        return new カート(
            new カートID($カートid->値()),
            $ユーザid,
        );
    }

    public function 再構成する(カートID $カートid, ユーザID $ユーザid)
    {
        return new カート(
            $カートid,
            $ユーザid,
        );
    }

    public function カート内商品を作成する(カートID $カートid, カート内商品ID $商品id, int $数量)
    {
        return new カート内商品(
            $カートid,
            $商品id,
            $数量,
            false
        );
    }

    public function カート内商品を再構成する(カートID $カートid, カート内商品ID $商品id, int $数量, bool $注文済みか)
    {
        return new カート内商品(
            $カートid,
            $商品id,
            $数量,
            $注文済みか
        );
    }
}
