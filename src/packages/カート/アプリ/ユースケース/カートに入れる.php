<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use Illuminate\Http\Request;
use カート\ドメイン\モデル\カートに入れるドメインサービス;

class カートに入れる
{
    private $カートに入れるドメインサービス;

    public function __construct(カートに入れるドメインサービス $カートに入れるドメインサービス)
    {
        $this->カートに入れるドメインサービス = $カートに入れるドメインサービス;
    }

    public function 実行(Request $リクエスト)
    {
        $this->カートに入れるドメインサービス->実行($リクエスト);
    }
}
