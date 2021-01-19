<?php

declare(strict_types=1);

namespace 注文\ドメイン\モデル;

interface 注文リポジトリインターフェース
{
    public function 保存(注文 $注文);
}
