<?php

declare(strict_types=1);

namespace 商品\アプリ\ユースケース;

use 共通\トランザクション\トランザクションインターフェース;
use 共通\配列コピー\ディープコピー;
use 商品\ドメイン\モデル\アップロード\画像アップローダインターフェース;
use 商品\ドメイン\モデル\カテゴリ;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品ファクトリ;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class 登録
{
    public function __construct(
        private トランザクションインターフェース $トランザクション,
        private 商品リポジトリインターフェース $商品リポ,
        private 商品ファクトリ $商品ファクトリ,
        private 画像アップローダインターフェース $画像アップローダ
    ) {
    }

    public function 実行(string $名前, int $レンタル料金, array $カテゴリ, array $複数画像ファイル)
    {
        $_カテゴリ = ディープコピー::実行($カテゴリ);
        $_複数画像ファイル = ディープコピー::実行($複数画像ファイル);

        $this->トランザクション->スコープ(function () use ($名前, $レンタル料金, $_カテゴリ, $_複数画像ファイル) {
            $商品 = $this->商品ファクトリ->作成する(
                $名前,
                new レンタル料金($レンタル料金),
                new カテゴリ($_カテゴリ['大カテゴリid'], $_カテゴリ['小カテゴリid'])
            );
            $商品->画像ファイルをストレージに保存する($this->画像アップローダ, $_複数画像ファイル);

            $this->商品リポ->保存($商品);
        });
    }
}
