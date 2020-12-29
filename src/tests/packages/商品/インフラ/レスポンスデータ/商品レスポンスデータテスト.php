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
    private function Null合体演算子の返却値($モック, bool $判定)
    {
        $モック->shouldReceive('offsetExists')
            ->andReturn($判定);
    }

    public function test_カテゴリidがnullの場合に指定した値が設定されていること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(100, '0', 0, 0, 0);
            $this->Null合体演算子の返却値($モック, false);
        });
        $レスポンスデータ = new 商品レスポンスデータ($エロクアントモック);

        self::assertSame(0, $レスポンスデータ->大カテゴリid());
        self::assertSame(0, $レスポンスデータ->小カテゴリid());
    }

    public function test_IDが取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(100, '0', 0, 0, 0);
            $this->Null合体演算子の返却値($モック, true);
        });
        $レスポンスデータ = new 商品レスポンスデータ($エロクアントモック);

        $id = $レスポンスデータ->id();

        self::assertSame(100, $id);
    }

    public function test_名前が取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(0, '名前', 0, 0, 0);
            $this->Null合体演算子の返却値($モック, true);
        });
        $レスポンスデータ = new 商品レスポンスデータ($エロクアントモック);

        $名前 = $レスポンスデータ->名前();

        self::assertSame('名前', $名前);
    }

    public function test_レンタル料金が取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(0, '0', 100, 0, 0);
            $this->Null合体演算子の返却値($モック, true);
        });
        $レスポンスデータ = new 商品レスポンスデータ($エロクアントモック);

        $レンタル料金 = $レスポンスデータ->レンタル料金();

        self::assertSame(100, $レンタル料金);
    }

    public function test_大カテゴリidが取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(0, '0', 0, 1, 0);
            $this->Null合体演算子の返却値($モック, true);
        });
        $レスポンスデータ = new 商品レスポンスデータ($エロクアントモック);

        $大カテゴリid = $レスポンスデータ->大カテゴリid();

        self::assertSame(1, $大カテゴリid);
    }

    public function test_小カテゴリidが取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(0, '0', 0, 0, 1);
            $this->Null合体演算子の返却値($モック, true);
        });
        $レスポンスデータ = new 商品レスポンスデータ($エロクアントモック);

        $小カテゴリid = $レスポンスデータ->小カテゴリid();

        self::assertSame(1, $小カテゴリid);
    }
}
