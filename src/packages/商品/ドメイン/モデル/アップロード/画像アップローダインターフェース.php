<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル\アップロード;

use 商品\ドメイン\モデル\商品ID;

interface 画像アップローダインターフェース
{
    public function アップロードする(ファイル $画像ファイル, 商品ID $商品id): ?ファイル;
}
