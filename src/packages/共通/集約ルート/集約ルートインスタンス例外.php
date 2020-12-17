<?php

declare(strict_types=1);

namespace 共通\集約ルート;

use ErrorException;

class 集約ルートインスタンス例外 extends ErrorException
{
    public function __construct()
    {
        parent::__construct('集約ルートのインスタンスではありません。集約ルートをimplementsして下さい');
    }
}
