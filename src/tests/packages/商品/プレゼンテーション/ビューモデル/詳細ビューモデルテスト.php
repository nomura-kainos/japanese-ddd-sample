<?php

declare(strict_types=1);

namespace Tests\packages\商品\プレゼンテーション\ビューモデル;

use Illuminate\Support\Collection;
use Tests\TestCase;
use 商品\プレゼンテーション\ビューモデル\詳細ビューモデル;
use 商品カテゴリ\インフラ\エロクアント\商品カテゴリエロクアント;
use 商品カテゴリ\インフラ\レスポンスデータ\商品カテゴリコレクションレスポンスデータ;

/**
 * @group 商品
 */
class 詳細ビューモデルテスト extends TestCase
{
    private $商品 = [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000,
            'カテゴリid' => 1,
            'カテゴリ名' => 'カテゴリ名1',
    ];

    public function test_料金の書式として3桁ごとにカンマが表示されること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリid'],
            $this->商品['カテゴリ名'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
        );

        $レンタル料金 = $ビューモデル->レンタル料金();

        self::assertSame('1,000', $レンタル料金);
    }

    public function test_IDが取得できること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリid'],
            $this->商品['カテゴリ名'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
        );

        $id = $ビューモデル->id();

        self::assertSame('1', $id);
    }

    public function test_名前が取得できること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリid'],
            $this->商品['カテゴリ名'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
        );

        $名前 = $ビューモデル->名前();

        self::assertSame('登録済', $名前);
    }

    public function test_レンタル料金が取得できること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            500,
            $this->商品['カテゴリid'],
            $this->商品['カテゴリ名'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
        );

        $レンタル料金 = $ビューモデル->レンタル料金();

        self::assertSame('500', $レンタル料金);
    }

    public function test_カテゴリidが取得できること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリid'],
            $this->商品['カテゴリ名'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
        );

        $カテゴリid = $ビューモデル->カテゴリid();

        self::assertSame('1', $カテゴリid);
    }

    public function test_カテゴリ名が取得できること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリid'],
            $this->商品['カテゴリ名'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
        );

        $カテゴリ名 = $ビューモデル->カテゴリ名();

        self::assertSame('カテゴリ名1', $カテゴリ名);
    }

    public function test_カテゴリコレクションが取得できること()
    {
        $エロクアントモック = $this->mock(商品カテゴリエロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(1, 'カテゴリ名1');
        });
        $コレクション = new Collection([$エロクアントモック]);

        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['カテゴリid'],
            $this->商品['カテゴリ名'],
            new 商品カテゴリコレクションレスポンスデータ($コレクション),
        );

        $カテゴリコレクション = $ビューモデル->カテゴリコレクション();

        self::assertSame(1, $カテゴリコレクション->first()->id());
        self::assertSame('カテゴリ名1', $カテゴリコレクション->first()->名前());
    }
}
