<?php

declare(strict_types=1);

namespace Tests\packages\商品\アプリ\ユースケース;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use 共通\トランザクション\DBトランザクション;
use 商品\アプリ\ユースケース\登録;
use 商品\インフラ\アップロード\画像アップローダ;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\ドメイン\モデル\アップロード\ファイル;
use 商品\ドメイン\モデル\カテゴリ;
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
            id: new 商品ID(1),
            名前: '登録',
            レンタル料金: new レンタル料金(1000),
            カテゴリ: new カテゴリ(1, 1),
        );
    }
    public function test_最後のメソッドが実行されること()
    {
        $リポジトリスパイ = $this->spy(商品リポジトリ::class);
        $ファクトリモック = $this->mock(商品ファクトリ::class, function ($モック) {
            $モック->shouldReceive('作成する')
                ->andReturn($this->テスト商品を作成());
        });
        $画像アップローダモック = $this->mock(画像アップローダ::class, function ($モック) {
            $モック->shouldReceive('ストレージに送信する')
                ->andReturn($this->mock(ファイル::class));
        });
        $ユースケース = new 登録(new DBトランザクション(), $リポジトリスパイ, $ファクトリモック, $画像アップローダモック);
        $複数画像ファイル = [$this->mock(UploadedFile::class)];
        $カテゴリ = [
            '大カテゴリid' => 1,
            '小カテゴリid' => 1,
        ];

        $ユースケース->実行('名前', 1000, $カテゴリ, $複数画像ファイル);

        $リポジトリスパイ->shouldHaveReceived('保存');
    }
}
