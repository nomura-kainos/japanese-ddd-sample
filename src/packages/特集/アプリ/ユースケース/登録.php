<?php

declare(strict_types=1);

namespace 特集\アプリ\ユースケース;

use 特集\ドメイン\モデル\アップロード\ファイル;
use 特集\ドメイン\モデル\特集ファクトリ;
use 特集\ドメイン\モデル\特集リポジトリインターフェース;

class 登録
{
    private $特集リポ;
    private $特集ファクトリ;

    public function __construct(
        特集リポジトリインターフェース $特集リポ,
        特集ファクトリ $特集ファクトリ
    ) {
        $this->特集リポ = $特集リポ;
        $this->特集ファクトリ = $特集ファクトリ;
    }

    public function 実行(string $タイトル, string $本文)
    {
        $特集 = $this->特集ファクトリ->作成する(
            $タイトル,
            $本文
        );
        $this->特集リポ->保存($特集);
    }
}
