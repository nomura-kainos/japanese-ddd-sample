<?php

declare(strict_types=1);

namespace 共通\仕様;

use 共通\仕様;

interface 選択 extends 仕様
{
    public function 基準を設定する($対象);
}
