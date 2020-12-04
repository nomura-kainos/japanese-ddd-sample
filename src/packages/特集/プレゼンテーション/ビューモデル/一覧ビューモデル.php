<?php

declare(strict_types=1);

namespace 特集\プレゼンテーション\ビューモデル;

use 特集\インフラ\レスポンスデータ\特集コレクションレスポンスデータ;

class 一覧ビューモデル
{
    private $特集コレクション;

    public function __construct(特集コレクションレスポンスデータ $コレクション)
    {
        $詰め替え後のコレクション = $コレクション->取得()->map(function ($特集) {

            return new 特集(
                $特集->id(),
                $特集->タイトル(),
            );
        });

        $this->特集コレクション = $詰め替え後のコレクション;
    }

    public function 取得()
    {
        return $this->特集コレクション;
    }
}
/*
 * phpでインナークラスが使えないため、privateにできない
 * このビューモデル以外で使わないこと
 */
class 特集
{
    private int $id;
    private string $タイトル;

    public function __construct(int $id, string $タイトル)
    {
        $this->id = $id;
        $this->タイトル = $タイトル;
    }

    public function id(): string
    {
        return (string)$this->id;
    }

    public function タイトル(): string
    {
        return $this->タイトル;
    }
}
