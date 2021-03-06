<?php

declare(strict_types=1);

namespace Tests\packages\共通;

use Tests\TestCase;
use 共通\値オブジェクト;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品ID;

/**
 * @group 共通
 */
class 値オブジェクトテスト extends TestCase
{
    /*
     * 同一性のテスト
     */
    public function test_属性が同じオブジェクトは同じオブジェクトとみなす()
    {
        $オブジェクト1 = new テスト値オブジェクト(1);
        $オブジェクト2 = new テスト値オブジェクト(1);

        self::assertTrue($オブジェクト1->等しいか？($オブジェクト2));
    }

    public function test_属性が異なるオブジェクトは別オブジェクトとみなす()
    {
        $オブジェクト1 = new テスト値オブジェクト(1);
        $オブジェクト2 = new テスト値オブジェクト(2);

        self::assertFalse($オブジェクト1->等しいか？($オブジェクト2));
    }

    /*
     * 可変性のテスト
     * 値オブジェクトの仕様を説明するために作成したが、テストできないためテストをスキップする
     */
    public function test_オブジェクトは不変のため、オブジェクトの値を変更できないこと()
    {
        $this->markTestSkipped();

        $オブジェクト = new テスト値オブジェクト(1);
//        $オブジェクト->id = 5;
    }

    public function test_設定した属性の値が入力と同じこと()
    {
        $オブジェクト = new テスト値オブジェクト(1);

        self::assertSame(1, $オブジェクト->id);
    }

    public function test_設定した属性の値が入力と同じこと_プロパティに値オブジェクトを含む場合()
    {
        $オブジェクト = new 値オブジェクトを複数持つテスト値オブジェクト(
            id: new 商品ID(1),
            名前: '名前',
            レンタル料金: new レンタル料金(2000),
        );

        self::assertSame(1, $オブジェクト->id->値);
        self::assertSame('名前', $オブジェクト->名前);
        self::assertSame(2000, $オブジェクト->レンタル料金->値);
    }
}
/**
 * @property-read int $id
 */
class テスト値オブジェクト
{
    use 値オブジェクト;

    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}

/**
 * @property-read 商品ID $id
 * @property-read string $名前
 * @property-read レンタル料金 $レンタル料金
 * 値オブジェクトを単数持つテストクラスは複数持つケースが条件を満たすため、単数のクラスは作成しない
 */
class 値オブジェクトを複数持つテスト値オブジェクト
{
    use 値オブジェクト;

    private 商品ID $id;
    private string $名前;
    private レンタル料金 $レンタル料金;

    public function __construct(商品ID $id, string $名前, レンタル料金 $レンタル料金)
    {
        $this->id = $id;
        $this->名前 = $名前;
        $this->レンタル料金 = $レンタル料金;
    }
}
