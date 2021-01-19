<?php

declare(strict_types=1);

namespace Tests\packages\商品\インフラ\リポジトリ;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use 共通\集約ルート\集約ルートチェッカー;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\インフラ\エロクアント\商品カテゴリエロクアント;
use 商品\インフラ\エロクアント\商品画像エロクアント;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\ドメイン\モデル\カテゴリ;
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

    private function 商品リポジトリのインスタンスを作成(): 商品リポジトリ
    {
        return new 商品リポジトリ(
            new 集約ルートチェッカー(),
            new 商品エロクアント(),
            new 商品カテゴリエロクアント(),
            new 商品画像エロクアント()
        );
    }

    private function テスト用商品を作成(int $id, string $名前, int $レンタル料金, int $大カテゴリid, int $小カテゴリid): 商品
    {
        return new 商品(
            new 商品ID($id),
            $名前,
            new レンタル料金($レンタル料金),
            new カテゴリ($大カテゴリid, $小カテゴリid)
        );
    }

    public function test_商品の新規登録ができること()
    {
        $リポジトリ = $this->商品リポジトリのインスタンスを作成();
        $商品 = $this->テスト用商品を作成(1, '登録済', 1000, 1, 1);

        $リポジトリ->保存($商品);

        $this->assertDatabaseHas('商品', [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000,
            '大カテゴリid' => 1,
            '小カテゴリid' => 1,
        ]);
    }

    public function test_既に登録されている商品が更新できること()
    {
        $this->seed('商品が1件登録済シーダ');
        $リポジトリ = $this->商品リポジトリのインスタンスを作成();
        $商品 = $this->テスト用商品を作成(1, '更新済', 2000, 2, 2);

        $リポジトリ->保存($商品);

        $this->assertDatabaseHas('商品', [
            'id' => 1,
            '名前' => '更新済',
            'レンタル料金' => 2000,
            '大カテゴリid' => 2,
            '小カテゴリid' => 2,
        ]);
    }

    public function test_登録された商品が残っていないこと()
    {
        $this->seed('商品が1件登録済シーダ');
        $リポジトリ = $this->商品リポジトリのインスタンスを作成();
        $商品 = $this->テスト用商品を作成(1, '更新済', 2000, 1, 1);

        $リポジトリ->保存($商品);

        $this->assertDatabaseMissing('商品', [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000,
            '大カテゴリid' => 1,
            '小カテゴリid' => 1,
        ]);
    }
}
