<?php

declare(strict_types=1);

namespace 商品カテゴリ\プレゼンテーション\ビューモデル\小カテゴリ;

use 共通\配列コピー\ディープコピー;
use 商品カテゴリ\インフラ\レスポンスデータ\小カテゴリ\一覧表示クエリレスポンスデータ;

class 一覧ビューモデル
{
    private $商品カテゴリコレクション;

    public function __construct(一覧表示クエリレスポンスデータ $レスポンスデータ)
    {
        $詰め替え後のコレクション = $レスポンスデータ->取得()->map(function ($商品カテゴリ) {

            return new 商品カテゴリ(
                $商品カテゴリ->id(),
                $商品カテゴリ->名前()
            );
        });

        $this->商品カテゴリコレクション = $詰め替え後のコレクション;
    }

    public function 取得(): array
    {
        return ディープコピー::実行($this->商品カテゴリコレクション->toArray());
    }
}
/*
 * phpでインナークラスが使えないため、privateにできない
 * このビューモデル以外で使わないこと
 */
class 商品カテゴリ
{
    public function __construct(
        private int $id,
        private string $名前
    ) {
    }

    public function id(): string
    {
        return (string)$this->id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }
}
