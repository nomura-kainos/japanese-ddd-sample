<?php

declare(strict_types=1);

namespace Tests\pakages\ルート;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    public function test_一覧画面に遷移できること()
    {
        $正常ステータス = 200;

        $レスポンス = $this->get('/item');

        $レスポンス->assertStatus($正常ステータス);
    }

    public function test_存在しない一覧画面に遷移できないこと()
    {
        $レスポンス = $this->get('/item/1');

        $レスポンス->assertStatus(404);
    }
}
