<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use Illuminate\Http\Request;
use カート\ドメイン\モデル\カートドメインサービス;

class カート内商品を削除
{
    private $カートドメインサービス;

    public function __construct(カートドメインサービス $カートドメインサービス)
    {
        $this->カートドメインサービス = $カートドメインサービス;
    }

    public function 実行(Request $リクエスト)
    {
        $this->カートドメインサービス->カート内商品を削除((int)$リクエスト->カートid, (int)$リクエスト->商品id);
    }
}
