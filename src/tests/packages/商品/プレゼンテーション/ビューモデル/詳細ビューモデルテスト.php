<?php

declare(strict_types=1);

namespace Tests\packages\商品\プレゼンテーション\ビューモデル;

use Tests\TestCase;
use 商品\プレゼンテーション\ビューモデル\詳細ビューモデル;

/**
 * @group 商品
 */
class 詳細ビューモデルテスト extends TestCase
{
    private $商品 = [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000
    ];

    public function test_料金の書式として3桁ごとにカンマが表示されること()
    {
        $ビューモデル = new 詳細ビューモデル(
            $this->商品['id'],
            $this->商品['名前'],
            $this->商品['レンタル料金'],
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
        );

        $レンタル料金 = $ビューモデル->レンタル料金();

        self::assertSame('500', $レンタル料金);
    }
}
