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

    public function 作成する(ユーザID $ユーザid, カート内商品ID $商品id, int $数量): カート
    {
        $カートid = $this->カートリポ->登録用に次のカートIDを取得する();
        $登録用カートid = new カートID($カートid->値());
        $カート内商品 = new カート内商品(
            $登録用カートid,
            $商品id,
            $数量
        );

        return new カート(
            $登録用カートid,
            $ユーザid,
            $カート内商品,
        );
    }

    public function 再構成する(カートID $カートid, ユーザID $ユーザid, カート内商品ID $商品id, int $数量): カート
    {
        $カート内商品 = new カート内商品(
            $カートid,
            $商品id,
            $数量
        );

        return new カート(
            $カートid,
            $ユーザid,
            $カート内商品,
        );
    }
}
