<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル\アップロード;

interface 画像アップローダインターフェース
{
    public function ストレージに送信する(ファイル $画像ファイル): ?ファイル;
}
