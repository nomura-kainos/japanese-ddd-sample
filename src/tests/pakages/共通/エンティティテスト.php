<?php
declare(strict_types=1);

namespace Tests\pakages\共通;

use Tests\TestCase;
use 共通\エンティティ;
use 共通\ユニークキー;

class エンティティテスト extends TestCase
{
    public function test_ユニークキーが同じエンティティは同じオブジェクトとみなす()
    {
        $エンティティ1 = new テストエンティティ((new ユニークキー(1)));
        $エンティティ2 = new テストエンティティ((new ユニークキー(1)));

        self::assertTrue($エンティティ1->等しいか($エンティティ2));
    }
}

class テストエンティティ extends エンティティ{
    public function __construct(ユニークキー $ユニークキー)
    {
        parent::ユニークキーを設定する($ユニークキー);
    }
}
