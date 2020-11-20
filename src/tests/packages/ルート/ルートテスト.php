<?php

declare(strict_types=1);

namespace Tests\packages\ルート;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

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
        $this->seed('商品が1件登録済シーダ');
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

    /**
     * @dataProvider URIプロバイダ_POST
     * @param string $URI
     * @param array $入力
     */
    public function test_画面に遷移できること_POST(string $URI, array $入力)
    {
        $this->seed('商品が1件登録済シーダ');
        $正常ステータス = 302;

        $レスポンス = $this->post($URI, $入力);

        $レスポンス->assertStatus($正常ステータス);
    }

    /**
     * @dataProvider URIプロバイダ_POST
     * @param string $URI
     * @param array $入力
     * @param string $リダイレクトURI
     */
    public function test_リダイレクトされること(string $URI, array $入力, string $リダイレクトURI)
    {
        $this->seed('商品が1件登録済シーダ');
        $レスポンス = $this->post($URI, $入力);

        $レスポンス->assertRedirect($リダイレクトURI);
    }

    public function URIプロバイダ_POST()
    {
        return [
            [
                '/item/edit/1',
                [
                    'id' => 1,
                    '名前' => '更新',
                    'レンタル料金' => '2,000',
                    'カテゴリid' => 1,
                ],
                '/item',
            ],
            [
                '/item/register',
                [
                    '名前' => '登録',
                    'レンタル料金' => 1000,
                ],
                '/item',
            ],
        ];
    }

    public function test_存在しない画面に遷移できないこと()
    {
        $レスポンス = $this->get('/item/1');

        $レスポンス->assertStatus(404);
    }
}
