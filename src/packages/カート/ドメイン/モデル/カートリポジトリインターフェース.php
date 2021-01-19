<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

interface カートリポジトリインターフェース
{
    public function 保存(カート $カート);

    public function カート内商品を削除(カートID $カートid, カート内商品ID $商品id);
}
