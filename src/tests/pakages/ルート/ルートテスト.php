<?php

declare(strict_types=1);

namespace Tests\pakages\ルート;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use 商品\インフラ\エロクアント\商品エロクアント;

/**
 * @group ルート
 */
class ルートテスト extends TestCase
{
    /*
     * 画面に遷移時にデータベースがないと異常エラーになってしまうため
     * マイグレーションを実施する
     */
    use DatabaseMigrations;

    /**
     * @dataProvider URIプロバイダ_GET
     * @param string $URI
     */
    public function test_画面に遷移できること_GET(string $URI)
    {
        factory(商品エロクアント::class, '商品が1件登録済')->create();
        $正常ステータス = 200;

        $レスポンス = $this->get($URI);

        $レスポンス->assertStatus($正常ステータス);
    }

    public function URIプロバイダ_GET()
    {
        return [
            ['/item'],
            ['/item_detail/1'],
            ['/item/register']
        ];
    }

    public function test_存在しない画面に遷移できないこと()
    {
        $レスポンス = $this->get('/item/1');

        $レスポンス->assertStatus(404);
    }
}
