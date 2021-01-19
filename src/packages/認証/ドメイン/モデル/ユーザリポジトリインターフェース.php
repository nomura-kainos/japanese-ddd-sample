<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

interface ユーザリポジトリインターフェース
{
    public function 保存(ユーザ $ユーザ);
}
