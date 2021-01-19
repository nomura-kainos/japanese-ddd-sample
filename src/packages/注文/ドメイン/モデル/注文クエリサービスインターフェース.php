<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

use 注文\インフラ\レスポンスデータ\注文IDレスポンスデータ;

interface 注文クエリサービスインターフェース
{
    public function 登録用に次の注文IDを取得する(): 注文IDレスポンスデータ;
}
