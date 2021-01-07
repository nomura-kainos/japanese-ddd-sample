<?php

declare(strict_types=1);

namespace カート\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;
use カート\インフラ\エロクアント\カート内商品エロクアント;

class カート内商品コレクションレスポンスデータ
{
    private $商品コレクション;

    public function __construct(Collection $コレクション)
    {
        $商品コレクション = $コレクション->map(function ($商品) {
            return new _カート内商品($商品);
        });

        $this->商品コレクション = $商品コレクション;
    }

    public function 取得(): array
    {
        return $this->商品コレクション->toArray();
    }
}

/*
 * phpでインナークラスが使えないため、privateにできない
 * このビューモデル以外で使わないこと
 */
class _カート内商品
{
    private int $カートid;
    private int $商品id;
    private int $数量;
    private bool $注文済みか？;

    public function __construct(カート内商品エロクアント $カート内商品)
    {
        $this->カートid = $カート内商品->カートid;
        $this->商品id = $カート内商品->商品id;
        $this->数量 = $カート内商品->数量;
        $this->注文済みか？ = $カート内商品->注文済みか？;
    }

    public function カートid(): int
    {
        return $this->カートid;
    }

    public function 商品id(): int
    {
        return $this->商品id;
    }

    public function 数量(): int
    {
        return $this->数量;
    }

    public function 注文済みか？(): bool
    {
        return $this->注文済みか？;
    }
}
