<?php

declare(strict_types=1);

namespace Tests\packages\共通;

use Tests\TestCase;
use 共通\ユニークキー\単一ユニークキー;
use 共通\ユニークキー\複合ユニークキー;

/**
 * @group 共通
 */
class ユニークキーテスト extends TestCase
{
    public function test_設定した属性の値が入力と同じこと()
    {
        $ユニークキー = new テスト単一ユニークキー(1);

        self::assertSame(1, $ユニークキー->値);
    }

    public function test_複合で、設定した属性の値が入力と同じこと()
    {
        $ユニークキー = new 複合ユニークキー(1, 2);

        self::assertSame(1, $ユニークキー->値1);
        self::assertSame(2, $ユニークキー->値2);
    }
}
class テスト単一ユニークキー extends 単一ユニークキー
{

}
