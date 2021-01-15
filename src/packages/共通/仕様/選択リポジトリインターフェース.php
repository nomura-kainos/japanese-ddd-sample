<?php

declare(strict_types=1);

namespace 共通\仕様;

interface 選択リポジトリインターフェース
{
    public function 満たすレコードを1件取得(string $テーブル名, 選択 $仕様): mixed;
}
