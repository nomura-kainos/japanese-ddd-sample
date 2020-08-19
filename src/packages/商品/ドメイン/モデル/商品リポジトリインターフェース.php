<?php

namespace 商品\ドメイン\モデル;

use Illuminate\Support\Collection;

interface 商品リポジトリインターフェース
{
    /**
     * @param int $id
     * @return 商品
     */
    public function IDで1件取得(int $id): 商品;

    /**
     * @return Collection
     */
    public function 全件取得(): Collection;

    /**
     * @param 商品 $商品
     * @return void
     */
    public function 保存(商品 $商品);
}
