<?php

declare(strict_types=1);

namespace Tests\packages\商品\インフラ\リポジトリ;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use 共通\ID採番\DBシーケンス;
use 共通\ID採番\ID採番インターフェース;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\エロクアント\商品カテゴリエロクアント;
use 商品\インフラ\エロクアント\商品画像エロクアント;
use 商品\インフラ\リポジトリ\商品クエリサービス;
use 商品\ドメイン\モデル\商品ID;
use Mockery;

/**
 * @group 商品
 */
class 商品クエリサービステスト extends TestCase
{
    /*
     * 各テストの前後にデータベースをマイグレーションする
     * https://laravel.com/api/6.x/Illuminate/Foundation/Testing/RefreshDatabase.html
     */
    use RefreshDatabase;

    private function 商品クエリサービスのインスタンスを作成(): 商品クエリサービス
    {
        return new 商品クエリサービス(
            new DBシーケンス(),
            new 商品エロクアント(),
            new 商品カテゴリエロクアント(),
            new 商品画像エロクアント()
        );
    }

    public function test_登録用に次の商品IDが取得できること()
    {
        $ID採番モック = $this->instance(ID採番インターフェース::class, Mockery::mock(DBシーケンス::class, function ($モック) {
                $モック->shouldReceive('連番を発行する')
                    ->once()
                    ->andReturn(2);
        }));
        $クエリサービス = new 商品クエリサービス(
            $ID採番モック,
            new 商品エロクアント(),
            new 商品カテゴリエロクアント(),
            new 商品画像エロクアント()
        );

        $レスポンスデータ = $クエリサービス->登録用に次の商品IDを取得する();

        self::assertSame(2, $レスポンスデータ->値());
    }

    public function test_商品IDで指定した商品が取得できること()
    {
        $this->seed('商品が1件登録済シーダ');
        $クエリサービス = $this->商品クエリサービスのインスタンスを作成();

        $レスポンスデータ = $クエリサービス->IDで1件取得(new 商品ID(1));

        self::assertSame(1, $レスポンスデータ->id());
        self::assertSame('登録済', $レスポンスデータ->名前());
        self::assertSame(1000, $レスポンスデータ->レンタル料金());
        self::assertSame(1, $レスポンスデータ->大カテゴリid());
        self::assertSame(1, $レスポンスデータ->小カテゴリid());
    }

    public function test_指定した商品が取得できない場合、nullを返す()
    {
        $this->seed('商品が1件登録済シーダ');
        $クエリサービス = $this->商品クエリサービスのインスタンスを作成();

        $レスポンスデータ = $クエリサービス->IDで1件取得(new 商品ID(2));

        self::assertNull($レスポンスデータ);
    }
}
