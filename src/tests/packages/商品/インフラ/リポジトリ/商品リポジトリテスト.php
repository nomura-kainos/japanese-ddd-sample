<?php

declare(strict_types=1);

namespace Tests\packages\商品\インフラ\リポジトリ;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\ドメイン\モデル\カテゴリID;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品;
use 商品\ドメイン\モデル\商品ID;

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

    private function テスト用商品を作成(int $id, string $名前, int $レンタル料金, int $カテゴリid): 商品
    {
        return new 商品(
            new 商品ID($id),
            $名前,
            new レンタル料金($レンタル料金),
            new カテゴリID($カテゴリid)
        );
    }

    /*
     * id採番のテスト
     * id採番の仕様を説明するために作成したが、DBファサードのテストできないためテストをスキップする
     */
    public function test_登録用に次の商品IDが取得できること()
    {
        $this->markTestSkipped();

        // 通常使用する際は既に商品が登録されているため、同じ環境を考慮して事前に商品を登録する
        $this->seed('商品が1件登録済シーダ');
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント());

        $レスポンスデータ = $リポジトリ->登録用に次の商品IDを取得する();

        self::assertSame(2, $レスポンスデータ->値());
    }

    public function test_商品の新規登録ができること()
    {
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント());
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
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント());
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
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント());
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
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント());

        $レスポンスデータ = $リポジトリ->IDで1件取得(new 商品ID(1));

        self::assertSame(1, $レスポンスデータ->id());
        self::assertSame('登録済', $レスポンスデータ->名前());
        self::assertSame(1000, $レスポンスデータ->レンタル料金());
        self::assertSame(1, $レスポンスデータ->カテゴリid());
    }

    public function test_指定した商品が取得できない場合、nullを返す()
    {
        $this->seed('商品が1件登録済シーダ');
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント());

        $レスポンスデータ = $リポジトリ->IDで1件取得(new 商品ID(2));

        self::assertNull($レスポンスデータ);
    }

    public function test_全ての商品が取得できること()
    {
        $this->seed('商品が複数登録済シーダ');
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント());

        $コレクションレスポンスデータ = $リポジトリ->全件取得();

        self::assertSame(3, $コレクションレスポンスデータ->取得()->count());
    }

    public function test_商品が0件の場合、空の配列を返却すること()
    {
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント());

        $コレクションレスポンスデータ = $リポジトリ->全件取得();

        self::assertEmpty($コレクションレスポンスデータ->取得());
    }
}
