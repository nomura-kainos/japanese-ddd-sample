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

class 商品リポジトリテスト extends TestCase
{
    /*
     * 各テストの前後にデータベースをマイグレーションする
     * https://laravel.com/api/6.x/Illuminate/Foundation/Testing/RefreshDatabase.html
     */
    use RefreshDatabase;

    public function test_商品の新規登録ができること()
    {
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント);

        $リポジトリ->保存(
            new 商品(
                new 商品ID(1),
                '登録済',
                new レンタル料金(1000)
            ));

        $this->assertDatabaseHas('商品', [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000
        ]);
    }

    /**
     * @depends test_商品の新規登録ができること
     */
    public function test_既に登録されている商品が更新できること()
    {
        $リポジトリ = new 商品リポジトリ(new 商品エロクアント);

        $リポジトリ->保存(
            new 商品(
                new 商品ID(1),
                '更新済',
                new レンタル料金(2000)
            ));

        $this->assertDatabaseHas('商品', [
            'id' => 1,
            '名前' => '更新済',
            'レンタル料金' => 2000
        ]);
    }

    /**
     * @depends test_既に登録されている商品が更新できること
     */
    public function test_登録された商品が残っていないこと()
    {
        $this->assertDatabaseMissing('商品', [
            'id' => 1,
            '名前' => '登録済',
            'レンタル料金' => 1000
        ]);
    }
}
