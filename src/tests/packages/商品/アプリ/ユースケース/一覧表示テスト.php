<?php

declare(strict_types=1);

namespace Tests\packages\商品\アプリ\ユースケース;

use Illuminate\Support\Collection;
use Tests\TestCase;
use 商品\アプリ\ユースケース\一覧表示;
use 商品\インフラ\リポジトリ\一覧表示クエリサービス;
use 商品\インフラ\レスポンスデータ\商品コレクションレスポンスデータ;
use 商品\プレゼンテーション\ビューモデル\一覧ビューモデル;

/**
 * @group 商品
 */
class 一覧表示テスト extends TestCase
{
    public function test_一覧ビューモデルのインスタンスが返却されること()
    {
        $クエリサービスモック = $this->mock(一覧表示クエリサービス::class, function ($モック) {
            $空の配列 = new Collection();

            $モック->shouldReceive('全件取得')
                ->andReturn(new 商品コレクションレスポンスデータ($空の配列));
        });
        $ユースケース = new 一覧表示($クエリサービスモック);

        $ビューモデル = $ユースケース->実行();

        $this->assertInstanceOf(一覧ビューモデル::class, $ビューモデル);
    }
}
