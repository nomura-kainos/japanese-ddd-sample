<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use Illuminate\Http\Request;
use カート\ドメイン\モデル\カートドメインサービス;

class カートに入れる
{
    private $カートドメインサービス;

    public function __construct(カートドメインサービス $カートドメインサービス)
    {
        $this->カートドメインサービス = $カートドメインサービス;
    }

    public function 実行(Request $リクエスト)
    {
        $this->カートドメインサービス->カートに入れる((int)$リクエスト->商品id, (int)$リクエスト->数量);
    }
}
