<?php

declare(strict_types=1);

namespace Tests\packages\商品\アプリ\ユースケース;

use Illuminate\Http\Request;
use Tests\TestCase;
use 商品\アプリ\ユースケース\登録;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\ドメイン\モデル\カテゴリID;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品;
use 商品\ドメイン\モデル\商品ID;
use 商品\ドメイン\モデル\商品ファクトリ;

/**
 * @group 商品
 */
class 登録テスト extends TestCase
{
    private function テスト商品を作成(): 商品
    {
        return new 商品(
            new 商品ID(1),
            '登録',
            new レンタル料金(1000),
            new カテゴリID(1)
        );
    }
    public function test_最後のメソッドが実行されること()
    {
        $リポジトリスパイ = $this->spy(商品リポジトリ::class);
        $ファクトリモック = $this->mock(商品ファクトリ::class, function ($モック) {
            $モック->shouldReceive('作成する')
                ->andReturn($this->テスト商品を作成());
        });
        $ユースケース = new 登録($リポジトリスパイ, $ファクトリモック);

        $ユースケース->実行('名前', 1000, 1);

        $リポジトリスパイ->shouldHaveReceived('保存');
    }
}
