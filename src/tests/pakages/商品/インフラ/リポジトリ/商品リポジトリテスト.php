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
                'テスト',
                new レンタル料金(1000)
            ));

        $this->assertDatabaseHas('商品', [
            'id' => 1,
            '名前' => 'テスト',
            'レンタル料金' => 1000
        ]);
    }
}
