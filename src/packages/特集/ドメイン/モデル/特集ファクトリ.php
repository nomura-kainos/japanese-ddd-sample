<?php

declare(strict_types=1);

namespace 特集\ドメイン\モデル;

class 特集ファクトリ
{
    private 特集リポジトリインターフェース $特集リポ;

    public function __construct(特集リポジトリインターフェース $特集リポ)
    {
        $this->特集リポ = $特集リポ;
    }

    public function 作成する(string $タイトル, string $本文)
    {
        $特集id = $this->特集リポ->登録用に次の特集IDを取得する();
        return new 特集(
            new 特集ID($特集id->値()),
            $タイトル,
            $本文
        );
    }
}
