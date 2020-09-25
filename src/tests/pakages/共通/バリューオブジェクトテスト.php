<?php
declare(strict_types=1);

namespace Tests\pakages\共通;

use Tests\TestCase;
use 共通\バリューオブジェクト;

class バリューオブジェクトテスト extends TestCase
{
    /*
     * バリューオブジェクトの仕様を説明するために作成したが、テストできないためテストをスキップする
     */
    public function test_オブジェクトは不変のため、オブジェクトの値を変更できないこと()
    {
        $this->markTestSkipped();

        $オブジェクト = new テストバリューオブジェクト(1);
//        $オブジェクト->値 = 2;
    }

    public function test_属性が同じオブジェクトは同じオブジェクトとみなす()
    {
        $オブジェクト1 = new テストバリューオブジェクト(1);
        $オブジェクト2 = new テストバリューオブジェクト(1);

        self::assertTrue($オブジェクト1->等しいか($オブジェクト2));
    }

    public function test_属性が異なるオブジェクトは別オブジェクトとみなす()
    {
        $オブジェクト1 = new テストバリューオブジェクト(1);
        $オブジェクト2 = new テストバリューオブジェクト(2);

        self::assertFalse($オブジェクト1->等しいか($オブジェクト2));
    }

    public function test_設定した属性の値が入力と同じこと()
    {
        $オブジェクト = new テストバリューオブジェクト(1);

        self::assertSame(1, $オブジェクト->id);
    }
}
/**
 * @property-read int $id
 */
class テストバリューオブジェクト{
    use バリューオブジェクト;

    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
