<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

class 注文ファクトリ
{
    private ?注文リポジトリインターフェース $注文リポ;

    public function __construct(注文リポジトリインターフェース $注文リポ = null)
    {
        $this->注文リポ = $注文リポ;
    }

    public function 作成する(ユーザID $ユーザid, array $注文商品)
    {
        $注文id = $this->注文リポ->登録用に次の注文IDを取得する();
        $登録用注文id = new 注文ID($注文id->値());

        $注文明細 = array_map(
            function ($商品, $インデックス) use ($登録用注文id) {
                $値段表記を消した総額 = (int)str_replace(',', '', $商品["総額"]);

                $明細 = new 注文明細(
                    $登録用注文id,
                    $インデックス,
                    new 商品ID((int)$商品["商品id"]),
                    $商品["名前"],
                    (int)$商品["数量"],
                    $値段表記を消した総額
                );
                return $明細->連想配列();
            },
            $注文商品,
            $this->インデックス($注文商品)
        );

        return new 注文(
            $登録用注文id,
            $ユーザid,
            $注文明細
        );
    }

    private function インデックス(array $注文商品)
    {
        return range(1, count($注文商品));
    }
}
