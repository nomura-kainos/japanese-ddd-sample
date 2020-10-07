<?php

declare(strict_types=1);

namespace Tests\packages\商品\インフラ\レスポンスデータ;

use Tests\TestCase;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\レスポンスデータ\商品レスポンスデータ;

/**
 * @group 商品
 */
class 商品レスポンスデータテスト extends TestCase
{

    public function test_IDが取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(100, '0', 0);
        });
        $レスポンスデータ = new 商品レスポンスデータ($エロクアントモック);

        $id = $レスポンスデータ->id();

        self::assertSame(100, $id);
    }

    public function test_名前が取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(0, '名前', 0);
        });
        $レスポンスデータ = new 商品レスポンスデータ($エロクアントモック);

        $名前 = $レスポンスデータ->名前();

        self::assertSame('名前', $名前);
    }

    public function test_レンタル料金が取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(0, '0', 100);
        });
        $レスポンスデータ = new 商品レスポンスデータ($エロクアントモック);

        $レンタル料金 = $レスポンスデータ->レンタル料金();

        self::assertSame(100, $レンタル料金);
    }
}
