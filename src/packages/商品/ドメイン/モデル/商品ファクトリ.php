<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル;

use 共通\集約ルート\集約ルートチェッカーインターフェース;

class 商品ファクトリ
{
    private 集約ルートチェッカーインターフェース $集約ルートチェッカー;
    private ?商品リポジトリインターフェース $商品リポ;

    public function __construct(
        集約ルートチェッカーインターフェース $集約ルートチェッカー,
        商品リポジトリインターフェース $商品リポ = null
    ) {
        $this->集約ルートチェッカー = $集約ルートチェッカー;
        $this->商品リポ = $商品リポ;
    }

    public function 作成する(string $名前, レンタル料金 $レンタル料金, カテゴリID $カテゴリid)
    {
        $商品ID = $this->商品リポ->登録用に次の商品IDを取得する();
        $集約ルート = new 商品(
            new 商品ID($商品ID->値()),
            $名前,
            $レンタル料金,
            $カテゴリid
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }

    public function 再構成する(商品ID $id, string $名前, レンタル料金 $レンタル料金, カテゴリID $カテゴリid)
    {
        $集約ルート = new 商品(
            $id,
            $名前,
            $レンタル料金,
            $カテゴリid
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }
}
