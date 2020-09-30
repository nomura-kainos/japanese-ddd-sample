<?php
declare(strict_types=1);

namespace Tests\pakages\商品\インフラ\リポジトリ;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品;
use 商品\ドメイン\モデル\商品ID;
use 商品シーダー;

class 商品リポジトリテスト extends TestCase
{
    /*
     * 各テストの前後にデータベースをマイグレーションする
     * https://laravel.com/api/6.x/Illuminate/Foundation/Testing/RefreshDatabase.html
     */
    use RefreshDatabase;

    private function テスト用商品を作成(int $id, string $名前, int $レンタル料金): 商品
    {
        return new 商品(
            new 商品ID($id),
            $名前,
            new レンタル料金($レンタル料金)
        );
    }

    public function test_登録用に次の商品IDが取得できること()
    {
        // 通常使用する際は既に商品が登録されているため、同じ環境を考慮して事前に商品を登録する
        $this->seed(商品シーダー::class);
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント);

        $レスポンスデータ = $リポジトリ->登録用に次の商品IDを取得する();

        self::assertSame(2, $レスポンスデータ->値());
    }

    public function test_商品の新規登録ができること()
    {
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント);
        $商品 = $this->テスト用商品を作成(1, '登録済', 1000);

        $リポジトリ->保存($商品);

        $this->assertDatabaseHas('商品', [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000
        ]);
    }

    public function test_既に登録されている商品が更新できること()
    {
        factory(商品エロクアント::class, '商品が1件登録済')->make();

        $リポジトリ = new 商品リポジトリ(new 商品エロクアント);
        $商品 = $this->テスト用商品を作成(1, '更新済', 2000);

        $リポジトリ->保存($商品);

        $this->assertDatabaseHas('商品', [
            'id' => 1,
            '名前' => '更新済',
            'レンタル料金' => 2000
        ]);
    }

    public function test_登録された商品が残っていないこと()
    {
        factory(商品エロクアント::class, '商品が1件登録済')->make();
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント);
        $商品 = $this->テスト用商品を作成(1, '更新済', 2000);

        $リポジトリ->保存($商品);

        $this->assertDatabaseMissing('商品', [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000
        ]);
    }
}
