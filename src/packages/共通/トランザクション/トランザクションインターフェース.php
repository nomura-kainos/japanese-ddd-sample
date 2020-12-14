<?php

declare(strict_types=1);

namespace 共通\トランザクション;

interface トランザクションインターフェース
{
    public function スコープ(callable $トランザクションスコープ): ?object;

    public function 開始();

    public function コミット();

    public function ロールバック();
}
