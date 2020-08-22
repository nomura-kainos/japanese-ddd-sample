<?php
declare(strict_types=1);

namespace 商品\ドメイン\モデル;

use 商品\インフラ\レスポンスデータ\商品レスポンスデータ;

interface 商品リポジトリインターフェース
{
    /**
     * @param int $id
     * @return 商品レスポンスデータ
     */
    public function IDで1件取得(int $id): 商品レスポンスデータ;

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
