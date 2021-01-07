<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\集約ルート\集約ルートチェッカーインターフェース;

class カートファクトリ
{
    public function __construct(
        private 集約ルートチェッカーインターフェース $集約ルートチェッカー,
        private カートリポジトリインターフェース $カートリポ
    ) {
    }

    public function 作成する(ユーザID $ユーザid): カート
    {
        $カートid = $this->カートリポ->登録用に次のカートIDを取得する();
        $登録用カートid = new カートID($カートid->値());

        $集約ルート = new カート(
            $登録用カートid,
            $ユーザid
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }

    public function 再構成する(カートID $カートid, ユーザID $ユーザid, array $複数商品): カート
    {
        $カート内商品 = [];
        foreach ($複数商品 as $商品) {
            $カート内商品[] = new カート内商品(
                $カートid,
                new カート内商品ID($商品->商品id()),
                $商品->数量(),
            );
        }

        $集約ルート = new カート(
            $カートid,
            $ユーザid,
            $カート内商品,
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }
}
