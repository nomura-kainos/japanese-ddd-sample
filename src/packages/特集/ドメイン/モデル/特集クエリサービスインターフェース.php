<?php

declare(strict_types=1);

namespace 特集\ドメイン\モデル;

use 特集\インフラ\レスポンスデータ\特集IDレスポンスデータ;

interface 特集クエリサービスインターフェース
{
    public function 登録用に次の特集IDを取得する(): 特集IDレスポンスデータ;
}
