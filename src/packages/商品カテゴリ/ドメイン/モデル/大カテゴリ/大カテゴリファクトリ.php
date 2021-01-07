<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル\大カテゴリ;

use 共通\集約ルート\集約ルートチェッカーインターフェース;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリID;

class 大カテゴリファクトリ
{
    public function __construct(
        private 集約ルートチェッカーインターフェース $集約ルートチェッカー,
        private 大カテゴリリポジトリインターフェース $大カテゴリリポ
    ) {
    }

    public function 作成する(string $名前): 大カテゴリ
    {
        $商品カテゴリid = $this->大カテゴリリポ->登録用に次の商品カテゴリIDを取得する();
        $集約ルート = new 大カテゴリ(
            new 商品カテゴリID($商品カテゴリid->値()),
            $名前
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }

    public function 再構成する(商品カテゴリID $id, string $名前): 大カテゴリ
    {
        $集約ルート = new 大カテゴリ(
            $id,
            $名前
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }
}
