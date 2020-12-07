<?php

declare(strict_types=1);

namespace 特集\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;
use 特集\インフラ\エロクアント\特集エロクアント;

class 特集コレクションレスポンスデータ
{
    private $特集コレクション;

    public function __construct(Collection $コレクション)
    {
        $特集コレクション = $コレクション->map(function ($特集) {
            return new 特集($特集);
        });

        $this->特集コレクション = $特集コレクション;
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
    private string $タイトル画像ファイルパス;

    public function __construct(特集エロクアント $特集)
    {
        $this->id = $特集->id;
        $this->タイトル = $特集->タイトル;
        $this->タイトル画像ファイルパス = $特集->ファイルパス;
    }

    public function id(): int
    {
        return $this->id;
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