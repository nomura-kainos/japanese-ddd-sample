<?php

declare(strict_types=1);

namespace Tests\packages\共通;

use Tests\TestCase;
use 共通\エンティティ;
use 共通\ユニークキー;

/**
 * @group 共通
 */
class エンティティテスト extends TestCase
{
    /*
     * 同一性のテスト
     */
    public function test_ユニークキーの値が同じエンティティは同じオブジェクトとみなす()
    {
        $エンティティ1 = new テストエンティティ((new ユニークキー(1)));
        $エンティティ2 = new テストエンティティ((new ユニークキー(1)));

        self::assertTrue($エンティティ1->等しいか？($エンティティ2));
    }

    public function test_ユニークキーの値が異なるエンティティは別オブジェクトとみなす()
    {
        $エンティティ1 = new テストエンティティ((new ユニークキー(1)));
        $エンティティ2 = new テストエンティティ((new ユニークキー(2)));

        self::assertFalse($エンティティ1->等しいか？($エンティティ2));
    }

    /*
     * 可変性のテスト
     * エンティティの仕様を説明するために作成したが、テストできないためテストをスキップする
     */
    public function test_エンティティは可変のため、オブジェクトの値を変更できること()
    {
        $this->markTestSkipped();

        $エンティティ = new テストエンティティ(1);
        $エンティティ->id = 5;
    }

    public function test_ユニークキーの値がコンストラクタの設定値と同じこと()
    {
        $エンティティ = new テストエンティティ(new ユニークキー(1));

        self::assertSame(1, $エンティティ->ユニークキー());
    }
}

class テストエンティティ extends エンティティ
{
    public function __construct(ユニークキー $ユニークキー)
    {
        parent::ユニークキーを設定する($ユニークキー);
    }
}
