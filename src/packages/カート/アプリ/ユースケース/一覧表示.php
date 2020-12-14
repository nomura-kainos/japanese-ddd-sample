<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use カート\ドメイン\モデル\ユーザID;
use カート\プレゼンテーション\ビューモデル\一覧ビューモデル;

class 一覧表示
{
    private $一覧表示クエリサービス;

    public function __construct(一覧表示クエリサービスインターフェース $一覧表示クエリサービス)
    {
        $this->一覧表示クエリサービス = $一覧表示クエリサービス;
    }

    public function 実行(): 一覧ビューモデル
    {
        $カート内商品 = $this->一覧表示クエリサービス->全件取得(new ユーザID($this->ログインユーザ::id()));

        return new 一覧ビューモデル($カート内商品);
    }
}
