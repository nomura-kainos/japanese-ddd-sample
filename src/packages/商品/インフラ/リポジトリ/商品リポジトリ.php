<?php

declare(strict_types=1);

namespace 商品\インフラ\リポジトリ;

use 共通\集約ルート\集約ルートチェッカーインターフェース;
use 商品\インフラ\エロクアント\商品カテゴリエロクアント;
use 商品\インフラ\エロクアント\商品画像エロクアント;
use 商品\ドメイン\モデル\商品;
use 商品\インフラ\エロクアント\商品エロクアント;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 商品リポジトリ implements 商品リポジトリインターフェース
{
    public function __construct(
        private 集約ルートチェッカーインターフェース $集約ルートチェッカー,
        private 商品エロクアント $商品エロクアント,
        private 商品カテゴリエロクアント $商品カテゴリエロクアント,
        private 商品画像エロクアント $商品画像エロクアント
    ) {
    }

    public function 保存(商品 $商品)
    {
        $this->集約ルートチェッカー::チェック($商品);

        $this->商品エロクアント::updateOrCreate(
            ['id' => $商品->id()],
            [
                '名前' => $商品->名前(),
                'レンタル料金' => $商品->レンタル料金(),
                '大カテゴリid' => $商品->カテゴリ()->大カテゴリid,
                '小カテゴリid' => $商品->カテゴリ()->小カテゴリid,
            ]
        );

        foreach ($商品->アップロード済み複数ファイル() as $画像ファイル) {
            $画像 = new 商品画像エロクアント();
            $画像->fill([
                '商品id' => $商品->id(),
                'ファイル名' => $画像ファイル->保存前のファイル名を取得する(),
                'ファイルパス' => $画像ファイル->パスを取得する()
            ]);
            $画像->save();
        }
    }
}
