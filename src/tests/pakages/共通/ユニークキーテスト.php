<?php
declare(strict_types=1);

namespace Tests\pakages\共通;

use Tests\TestCase;
use 共通\ユニークキー;

class ユニークキーテスト extends TestCase
{
    public function test_設定した属性の値が入力と同じこと()
    {
        $ユニークキー = new ユニークキー(1);

        self::assertSame(1, $ユニークキー->値);
    }
}
