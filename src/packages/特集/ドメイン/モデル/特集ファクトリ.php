<?php

declare(strict_types=1);

namespace 特集\ドメイン\モデル;

use 共通\集約ルート\集約ルートチェッカーインターフェース;

class 特集ファクトリ
{
    public function __construct(
        private 集約ルートチェッカーインターフェース $集約ルートチェッカー,
        private 特集クエリサービスインターフェース $特集クエリ,
    ) {
    }

    public function 作成する(string $タイトル, string $本文): 特集
    {
        $特集id = $this->特集クエリ->登録用に次の特集IDを取得する();
        $集約ルート = new 特集(
            new 特集ID($特集id->値()),
            $タイトル,
            $本文
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }
}
