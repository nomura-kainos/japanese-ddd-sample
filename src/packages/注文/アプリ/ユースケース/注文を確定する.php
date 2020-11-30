<?php

declare(strict_types=1);

namespace 注文\アプリ\ユースケース;

use 注文\ドメイン\モデル\カテゴリID;
use 注文\ドメイン\モデル\ユーザID;
use 注文\ドメイン\モデル\レンタル料金;
use 注文\ドメイン\モデル\注文ファクトリ;
use 注文\ドメイン\モデル\注文リポジトリインターフェース;
use 認証\ドメイン\モデル\ログインユーザ;

class 注文を確定する
{
    private $注文リポ;
    private $注文ファクトリ;

    public function __construct(注文リポジトリインターフェース $注文リポ, 注文ファクトリ $注文ファクトリ)
    {
        $this->注文リポ = $注文リポ;
        $this->注文ファクトリ = $注文ファクトリ;
    }

    public function 実行(array $注文商品)
    {
        $ユーザid = new ユーザID(ログインユーザ::id());
        $商品 = $this->注文ファクトリ->作成する($ユーザid, $注文商品);

        $this->注文リポ->保存($商品);
    }
}
