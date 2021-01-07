<?php

declare(strict_types=1);

namespace 共通;

interface 仕様
{
    public function 満たすか？($対象): bool;
}
