<?php

declare(strict_types=1);

namespace Tests\packages\商品\インフラ\リポジトリ;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use 共通\ID採番\DBシーケンス;
use 共通\ID採番\ID採番インターフェース;
use 共通\集約ルート\集約ルートチェッカー;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\エロクアント\商品カテゴリエロクアント;
use 商品\インフラ\エロクアント\商品画像エロクアント;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\ドメイン\モデル\カテゴリID;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品;
use 商品\ドメイン\モデル\商品ID;
use Mockery;

/**
 * @group 商品
 */
class 商品リポジトリテスト extends TestCase
{
    /*
     * 各テストの前後にデータベースをマイグレーションする
     * https://laravel.com/api/6.x/Illuminate/Foundation/Testing/RefreshDatabase.html
     */
    use RefreshDatabase;

    private function 商品リポジトリのインスタンスを作成(): 商品リポジトリ
    {
        return new 商品リポジトリ(
            new 集約ルートチェッカー(),
            new DBシーケンス(),
            new 商品エロクアント(),
            new 商品カテゴリエロクアント(),
            new 商品画像エロクアント()
        );
    }

    private function テスト用商品を作成(int $id, string $名前, int $レンタル料金, int $カテゴリid): 商品
    {
        return new 商品(
            new 商品ID($id),
            $名前,
            new レンタル料金($レンタル料金),
            new カテゴリID($カテゴリid)
        );
    }

    public function test_登録用に次の商品IDが取得できること()
    {
        $ID採番モック = $this->instance(ID採番インターフェース::class, Mockery::mock(DBシーケンス::class, function ($モック) {
                $モック->shouldReceive('連番を発行する')
                    ->once()
                    ->andReturn(2);
        }));
        $リポジトリ = new 商品リポジトリ(
            new 集約ルートチェッカー(),
            $ID採番モック,
            new 商品エロクアント(),
            new 商品カテゴリエロクアント(),
            new 商品画像エロクアント()
        );

        $レスポンスデータ = $リポジトリ->登録用に次の商品IDを取得する();

        self::assertSame(2, $レスポンスデータ->値());
    }

    public function test_商品の新規登録ができること()
    {
        $リポジトリ = $this->商品リポジトリのインスタンスを作成();
        $商品 = $this->テスト用商品を作成(1, '登録済', 1000, 1);

        $リポジトリ->保存($商品);

        $this->assertDatabaseHas('商品', [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000,
            'カテゴリid' => 1,
        ]);
    }

    public function test_既に登録されている商品が更新できること()
    {
        $this->seed('商品が1件登録済シーダ');
        $リポジトリ = $this->商品リポジトリのインスタンスを作成();
        $商品 = $this->テスト用商品を作成(1, '更新済', 2000, 2);

        $リポジトリ->保存($商品);

        $this->assertDatabaseHas('商品', [
            'id' => 1,
            '名前' => '更新済',
            'レンタル料金' => 2000,
            'カテゴリid' => 2,
        ]);
    }

    public function test_登録された商品が残っていないこと()
    {
        $this->seed('商品が1件登録済シーダ');
        $リポジトリ = $this->商品リポジトリのインスタンスを作成();
        $商品 = $this->テスト用商品を作成(1, '更新済', 2000, 1);

        $リポジトリ->保存($商品);

        $this->assertDatabaseMissing('商品', [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000,
            'カテゴリid' => 1,
        ]);
    }

    public function test_商品IDで指定した商品が取得できること()
    {
        $this->seed('商品が1件登録済シーダ');
        $リポジトリ = $this->商品リポジトリのインスタンスを作成();

        $レスポンスデータ = $リポジトリ->IDで1件取得(new 商品ID(1));

        self::assertSame(1, $レスポンスデータ->id());
        self::assertSame('登録済', $レスポンスデータ->名前());
        self::assertSame(1000, $レスポンスデータ->レンタル料金());
        self::assertSame(1, $レスポンスデータ->カテゴリid());
    }

    public function test_指定した商品が取得できない場合、nullを返す()
    {
        $this->seed('商品が1件登録済シーダ');
        $リポジトリ = $this->商品リポジトリのインスタンスを作成();

        $レスポンスデータ = $リポジトリ->IDで1件取得(new 商品ID(2));

        self::assertNull($レスポンスデータ);
    }
}
