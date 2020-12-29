<?php

declare(strict_types=1);

namespace Tests\packages\商品\プレゼンテーション\ビューモデル;

use Illuminate\Support\Collection;
use Tests\TestCase;
use 商品\インフラ\エロクアント\商品画像エロクアント;
use 商品\インフラ\レスポンスデータ\商品画像コレクションレスポンスデータ;
use 商品\プレゼンテーション\ビューモデル\詳細ビューモデル;
use 商品\インフラ\エロクアント\商品カテゴリエロクアント;
use 商品\インフラ\レスポンスデータ\商品カテゴリコレクションレスポンスデータ;

/**
 * @group 商品
 */
class 詳細ビューモデルテスト extends TestCase
{
    private $商品 = [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000,
            '大カテゴリid' => 1,
            '小カテゴリid' => 2,
            'カテゴリ名' => 'カテゴリ名1',
    ];

    public function test_料金の書式として3桁ごとにカンマが表示されること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['大カテゴリid'],
            $this->商品['小カテゴリid'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
            new 商品画像コレクションレスポンスデータ(new Collection()),
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
            $this->商品['大カテゴリid'],
            $this->商品['小カテゴリid'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
            new 商品画像コレクションレスポンスデータ(new Collection()),
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
            $this->商品['大カテゴリid'],
            $this->商品['小カテゴリid'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
            new 商品画像コレクションレスポンスデータ(new Collection()),
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
            $this->商品['大カテゴリid'],
            $this->商品['小カテゴリid'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
            new 商品画像コレクションレスポンスデータ(new Collection()),
        );

        $レンタル料金 = $ビューモデル->レンタル料金();

        self::assertSame('500', $レンタル料金);
    }

    public function test_大カテゴリidが取得できること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['大カテゴリid'],
            $this->商品['小カテゴリid'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
            new 商品画像コレクションレスポンスデータ(new Collection()),
        );

        $大カテゴリid = $ビューモデル->大カテゴリid();

        self::assertSame('1', $大カテゴリid);
    }

    public function test_小カテゴリidが取得できること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['大カテゴリid'],
            $this->商品['小カテゴリid'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
            new 商品画像コレクションレスポンスデータ(new Collection()),
        );

        $小カテゴリid = $ビューモデル->小カテゴリid();

        self::assertSame('2', $小カテゴリid);
    }

    public function test_カテゴリコレクションが取得できること()
    {
        $エロクアントモック = $this->mock(商品カテゴリエロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn(1, '大カテゴリ名', 2, '小カテゴリ名');
        });
        $コレクション = new Collection([$エロクアントモック]);

        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['大カテゴリid'],
            $this->商品['小カテゴリid'],
            new 商品カテゴリコレクションレスポンスデータ($コレクション),
            new 商品画像コレクションレスポンスデータ(new Collection()),
        );

        $カテゴリコレクション = $ビューモデル->カテゴリコレクション();

        self::assertSame('■大カテゴリ名', $カテゴリコレクション[0]->名前);

        self::assertSame('－　小カテゴリ名', $カテゴリコレクション[1]->名前);
        self::assertSame(1, $カテゴリコレクション[1]->大カテゴリid);
        self::assertSame(2, $カテゴリコレクション[1]->小カテゴリid);
    }

    public function test_画像コレクションが取得できること()
    {
        $エロクアントモック = $this->mock(商品画像エロクアント::class, function ($モック) {
            $モック->shouldReceive('getAttribute')
                ->andReturn('ファイルパス1');
        });
        $コレクション = new Collection([$エロクアントモック]);

        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
            $this->商品['大カテゴリid'],
            $this->商品['小カテゴリid'],
            new 商品カテゴリコレクションレスポンスデータ(new Collection()),
            new 商品画像コレクションレスポンスデータ($コレクション),
        );

        $画像コレクション = $ビューモデル->画像コレクション();

        self::assertSame('ファイルパス1', $画像コレクション->first()->ファイルパス());
    }
}
