<?php
declare(strict_types=1);

namespace 商品\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;

class 商品コレクションレスポンスデータ
{

    private $商品コレクション;

    public function __construct(Collection $コレクション)
    {
        $商品コレクション = $コレクション->map(function ($商品) {
            return new 商品レスポンスデータ($商品);
        });

        $this->商品コレクション = $商品コレクション;
    }

    public function 取得()
    {
        return $this->商品コレクション;
    }
}
