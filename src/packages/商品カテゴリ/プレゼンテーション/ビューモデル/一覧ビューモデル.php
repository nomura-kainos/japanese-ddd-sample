<?php

declare(strict_types=1);

namespace 商品カテゴリ\プレゼンテーション\ビューモデル;

use 商品カテゴリ\インフラ\レスポンスデータ\商品カテゴリコレクションレスポンスデータ;

class 一覧ビューモデル
{
    private $商品カテゴリコレクション;

    public function __construct(商品カテゴリコレクションレスポンスデータ $コレクション)
    {
        $詰め替え後のコレクション = $コレクション->取得()->map(function ($商品カテゴリ) {

            return new 商品カテゴリ(
                $商品カテゴリ->id(),
                $商品カテゴリ->名前()
            );
        });

        $this->商品カテゴリコレクション = $詰め替え後のコレクション;
    }

    public function 取得()
    {
        return $this->商品カテゴリコレクション;
    }
}
/*
 * phpでインナークラスが使えないため、privateにできない
 * このビューモデル以外で使わないこと
 */
class 商品カテゴリ
{
    private int $id;
    private string $名前;

    public function __construct(int $id, string $名前)
    {
        $this->id = $id;
        $this->名前 = $名前;
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
