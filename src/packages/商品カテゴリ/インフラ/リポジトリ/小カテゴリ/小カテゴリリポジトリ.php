<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\リポジトリ\小カテゴリ;

use 共通\仕様\選択;
use 共通\仕様\選択リポジトリインターフェース;
use 共通\集約ルート\集約ルートチェッカーインターフェース;
use 商品カテゴリ\インフラ\エロクアント\小カテゴリエロクアント;
use 商品カテゴリ\インフラ\レスポンスデータ\小カテゴリ\小カテゴリレスポンスデータ;
use 商品カテゴリ\ドメイン\モデル\小カテゴリ\小カテゴリ;
use 商品カテゴリ\ドメイン\モデル\小カテゴリ\小カテゴリリポジトリインターフェース;

class 小カテゴリリポジトリ implements 小カテゴリリポジトリインターフェース
{
    public function __construct(
        private 集約ルートチェッカーインターフェース $集約ルートチェッカー,
        private 選択リポジトリインターフェース $選択リポ,
        private 小カテゴリエロクアント $小カテゴリエロクアント
    ) {
    }

    public function 仕様で取得(選択 $仕様): ?小カテゴリレスポンスデータ
    {
        $小カテゴリ = $this->選択リポ->満たすレコードを1件取得($this->小カテゴリエロクアント->getTable(), $仕様);
        if ($小カテゴリ === null) {
            return null;
        }
        return new 小カテゴリレスポンスデータ($小カテゴリ->小カテゴリid, $小カテゴリ->名前);
    }

    public function 保存(小カテゴリ $カテゴリ)
    {
        $this->集約ルートチェッカー::チェック($カテゴリ);

        $this->小カテゴリエロクアント::updateOrCreate(
            [
                '大カテゴリid' => $カテゴリ->大カテゴリid(),
                '小カテゴリid' => $カテゴリ->小カテゴリid()
            ],
            [
                '名前' => $カテゴリ->名前(),
            ]
        );
    }
}
