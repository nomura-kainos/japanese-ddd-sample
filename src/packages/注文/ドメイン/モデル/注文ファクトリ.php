<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

use 共通\配列コピー\ディープコピー;
use 共通\集約ルート\集約ルートチェッカーインターフェース;

class 注文ファクトリ
{
    public function __construct(
        private 集約ルートチェッカーインターフェース $集約ルートチェッカー,
        private 注文クエリサービスインターフェース $注文クエリ,
    ) {
    }

    public function 作成する(ユーザID $ユーザid, array $注文商品): 注文
    {
        $注文id = $this->注文クエリ->登録用に次の注文IDを取得する();
        $登録用注文id = new 注文ID($注文id->値());

        $注文明細 = array_map(
            function ($商品, $行番号) use ($登録用注文id) {
                $値段表記を消した総額 = (int)str_replace(',', '', $商品["総額"]);

                $明細 = new 注文明細(
                    $登録用注文id,
                    $行番号,
                    new 商品ID((int)$商品["商品id"]),
                    $商品["名前"],
                    (int)$商品["数量"],
                    $値段表記を消した総額
                );
                return $明細->連想配列();
            },
            $注文商品,
            $this->行番号の範囲を取得する($注文商品)
        );

        $集約ルート = new 注文(
            $登録用注文id,
            $ユーザid,
            $注文明細
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }

    private function 行番号の範囲を取得する(array $注文商品): array
    {
        $_注文商品 = ディープコピー::実行($注文商品);

        return ディープコピー::実行(range(1, count($_注文商品)));
    }
}
