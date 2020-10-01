<?php

declare(strict_types=1);

namespace Tests\packages\商品\アプリ\ユースケース;

use Illuminate\Http\Request;
use Tests\TestCase;
use 商品\アプリ\ユースケース\登録;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\インフラ\レスポンスデータ\商品IDレスポンスデータ;

/**
 * @group 商品
 */
class 登録テスト extends TestCase
{
    public function test_最後のメソッドが実行されること()
    {
        $リポジトリスパイ = $this->spy(商品リポジトリ::class, function ($モック) {
            $モック->shouldReceive('登録用に次の商品IDを取得する')
                ->andReturn(new 商品IDレスポンスデータ(1));
        });
        $リクエストモック = $this->mock(Request::class);
        $リクエストモック->名前 = '名前';
        $リクエストモック->レンタル料金 = 1000;
        $ユースケース = new 登録($リポジトリスパイ);

        $ユースケース->実行($リクエストモック);

        $リポジトリスパイ->shouldHaveReceived('保存');
    }
}
