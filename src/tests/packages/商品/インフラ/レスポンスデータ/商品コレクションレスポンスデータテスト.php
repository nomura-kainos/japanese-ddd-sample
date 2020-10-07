<?php

declare(strict_types=1);

namespace Tests\packages\商品\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;
use Tests\TestCase;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\レスポンスデータ\商品コレクションレスポンスデータ;

/**
 * @group 商品
 */
class 商品コレクションレスポンスデータテスト extends TestCase
{
    public function test_コレクションの値が取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(100, '登録', 1000);
        });
        $コレクション = new Collection([$エロクアントモック]);
        $商品コレクション = new 商品コレクションレスポンスデータ($コレクション);

        $コレクションレスポンスデータ = $商品コレクション->取得();

        self::assertSame(100, $コレクションレスポンスデータ->first()->id());
        self::assertSame('登録', $コレクションレスポンスデータ->first()->名前());
        self::assertSame(1000, $コレクションレスポンスデータ->first()->レンタル料金());
    }
}
