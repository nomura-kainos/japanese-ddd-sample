<?php

declare(strict_types=1);

namespace Tests\packages\商品\プレゼンテーション\ビューモデル;

use Illuminate\Support\Collection;
use Tests\TestCase;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;
use 商品\プレゼンテーション\ビューモデル\一覧ビューモデル;
use 商品\プレゼンテーション\ビューモデル\商品;

/**
 * @group 商品
 */
class 一覧ビューモデルテスト extends TestCase
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
                ->andReturn(100, '登録', 500, 'カテゴリ名1');
            $this->Null合体演算子の返却値($モック, true);
        });
        $コレクション = new Collection([$エロクアントモック]);
        $レスポンスデータ = new 一覧表示クエリレスポンスデータ($コレクション);

        $一覧ビュー = new 一覧ビューモデル($レスポンスデータ);

        $ビューモデル = $一覧ビュー->取得();

        self::assertSame('100', $ビューモデル->first()->id());
        self::assertSame('登録', $ビューモデル->first()->名前());
        self::assertSame('500', $ビューモデル->first()->レンタル料金());
        self::assertSame('カテゴリ名1', $ビューモデル->first()->カテゴリ名());
    }

    private $商品 = [
        'id' => 1,
        '名前' => '登録済',
        'レンタル料金' => 1000,
        'カテゴリ名' => 'カテゴリ名1'
    ];

    public function test_料金の書式として3桁ごとにカンマが表示されること()
    {
        $商品 = new 商品(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリ名']
        );

        $レンタル料金 = $商品->レンタル料金();

        self::assertSame('1,000', $レンタル料金);
    }


    public function test_IDが取得できること()
    {
        $商品 = new 商品(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリ名']
        );

        $id = $商品->id();

        self::assertSame('1', $id);
    }

    public function test_名前が取得できること()
    {
        $商品 = new 商品(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリ名']
        );

        $名前 = $商品->名前();

        self::assertSame('登録済', $名前);
    }

    public function test_レンタル料金が取得できること()
    {
        $商品 = new 商品(
            $this->商品['id'],
            $this->商品['名前'],
            500,
            $this->商品['カテゴリ名']
        );

        $レンタル料金 = $商品->レンタル料金();

        self::assertSame('500', $レンタル料金);
    }

    public function test_カテゴリ名が取得できること()
    {
        $商品 = new 商品(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリ名']
        );

        $カテゴリ名 = $商品->カテゴリ名();

        self::assertSame('カテゴリ名1', $カテゴリ名);
    }
}
