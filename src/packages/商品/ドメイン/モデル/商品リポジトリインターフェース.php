<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル;

interface 商品リポジトリインターフェース
{
    public function 保存(商品 $商品);
}
