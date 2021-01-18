<?php

declare(strict_types=1);

namespace 共通\配列コピー;

use function DeepCopy\deep_copy;

/*
 * https://kurochan-note.hatenablog.jp/entry/20110316/1300267023
 */
class ディープコピー
{
    public static function 実行(array $配列): array
    {
        $コピー済み配列 = deep_copy($配列);
        return $コピー済み配列;
    }
}
