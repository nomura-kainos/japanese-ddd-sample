<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル;

use 共通\配列コピー\ディープコピー;
use 商品\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;

class 一覧ビューモデル
{
    private $商品コレクション;

    public function __construct(一覧表示クエリレスポンスデータ $レスポンスデータ)
    {
        $詰め替え後のコレクション = $レスポンスデータ->取得()->map(function ($商品) {

            return new 商品(
                $商品->id(),
                $商品->名前(),
                $商品->レンタル料金(),
                $商品->カテゴリ名()
            );
        });

        $this->商品コレクション = $詰め替え後のコレクション;
    }

    public function 取得(): array
    {
        return ディープコピー::実行($this->商品コレクション->toArray());
    }
}
/*
 * phpでインナークラスが使えないため、privateにできない
 * このビューモデル以外で使わないこと
 */
class 商品
{
    public function __construct(
        private int $id,
        private string $名前,
        private int $レンタル料金,
        private string $カテゴリ名
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

    public function レンタル料金(): string
    {
        return number_format($this->レンタル料金);
    }

    public function カテゴリ名(): string
    {
        return $this->カテゴリ名;
    }
}
