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
    use DatabaseMigrations;

    public function test_一覧画面に遷移できること()
    {
        $レスポンス = $this->get('/item');

        $レスポンス->assertSuccessful();
    }
}
