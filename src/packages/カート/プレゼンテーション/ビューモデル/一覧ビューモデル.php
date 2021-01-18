<?php

declare(strict_types=1);

namespace カート\プレゼンテーション\ビューモデル;

use Illuminate\Support\Collection;
use カート\インフラ\レスポンスデータ\一覧表示クエリレスポンスデータ;

class 一覧ビューモデル
{
    private $カートコレクション;

    public function __construct(一覧表示クエリレスポンスデータ $レスポンスデータ)
    {
        $詰め替え後のコレクション = $レスポンスデータ->取得()->map(function ($カート) {

            return new カート内商品(
                $カート->カートid(),
                $カート->商品id(),
                $カート->名前(),
                $カート->価格(),
                $カート->数量()
            );
        });

        $this->カートコレクション = $詰め替え後のコレクション;
    }

    public function 取得(): Collection
    {
        return new Collection($this->カートコレクション);
    }
}
/*
 * phpでインナークラスが使えないため、privateにできない
 * このビューモデル以外で使わないこと
 */
class カート内商品
{
    public function __construct(
        private int $カートid,
        private int $商品id,
        private string $名前,
        private int $価格,
        private int $数量
    ) {
    }

    public function カートid(): string
    {
        return (string)$this->カートid;
    }

    public function 商品id(): string
    {
        return (string)$this->商品id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function 数量(): string
    {
        return (string)$this->数量;
    }

    public function 総額(): string
    {
        return number_format($this->価格 * $this->数量);
    }
}
