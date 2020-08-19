<?php

namespace 商品\ドメイン\モデル;

interface 商品リポジトリインターフェース
{
    /**
     * @param int $id
     * @return 商品
     */
    public function IDで1件取得(int $id): 商品;

    /**
     * @return 商品コレクション
     */
    public function 全件取得(): 商品コレクション;

    /**
     * @param 商品 $商品
     * @return void
     */
    public function 保存(商品 $商品);
}
