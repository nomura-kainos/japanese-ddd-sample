<?php

declare(strict_types=1);

namespace Tests\packages\商品\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;
use Tests\TestCase;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;

/**
 * @group 商品
 */
class 一覧表示クエリレスポンスデータテスト extends TestCase
{
    private function Null合体演算子の返却値($モック, bool $判定)
    {
        $モック->shouldReceive('offsetExists')
            ->andReturn($判定);
    }
    public function test_コレクションの値が取得できること()
    {
        $エロクアントモック = $this->mock(商品エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(100, '登録', 1000, 1, 'カテゴリ名1');
            $this->Null合体演算子の返却値($モック, true);
        });
        $コレクション = new Collection([$エロクアントモック]);
        $商品コレクション = new 一覧表示クエリレスポンスデータ($コレクション);

        $コレクションレスポンスデータ = $商品コレクション->取得();

        self::assertSame(100, $コレクションレスポンスデータ->first()->id());
        self::assertSame('登録', $コレクションレスポンスデータ->first()->名前());
        self::assertSame(1000, $コレクションレスポンスデータ->first()->レンタル料金());
        self::assertSame(1, $コレクションレスポンスデータ->first()->カテゴリid());
        self::assertSame('カテゴリ名1', $コレクションレスポンスデータ->first()->カテゴリ名());
    }
}
