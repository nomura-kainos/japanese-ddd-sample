<?php

declare(strict_types=1);

namespace 特集\プレゼンテーション\ビューモデル;

use Illuminate\Support\Collection;
use 特集\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;

class 一覧ビューモデル
{
    private $特集コレクション;

    public function __construct(一覧表示クエリレスポンスデータ $レスポンスデータ)
    {
        $詰め替え後のコレクション = $レスポンスデータ->取得()->map(function ($特集) {

            return new 特集(
                $特集->id(),
                $特集->タイトル(),
                $特集->タイトル画像ファイルパス()
            );
        });

        $this->特集コレクション = $詰め替え後のコレクション;
    }

    public function 取得(): Collection
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
    private string $タイトル画像ファイルパス;

    public function __construct(int $id, string $タイトル, string $タイトル画像ファイルパス)
    {
        $this->id = $id;
        $this->タイトル = $タイトル;
        $this->タイトル画像ファイルパス = $タイトル画像ファイルパス;
    }

    public function id(): string
    {
        return (string)$this->id;
    }

    public function タイトル(): string
    {
        return $this->タイトル;
    }

    public function タイトル画像ファイルパス(): string
    {
        return $this->タイトル画像ファイルパス;
    }
}
