<?php

declare(strict_types=1);

namespace 商品\インフラ\アップロード;

use 商品\ドメイン\モデル\アップロード\ファイル;
use 商品\ドメイン\モデル\アップロード\画像アップローダインターフェース;
use 商品\ドメイン\モデル\商品ID;

class 画像アップローダ implements 画像アップローダインターフェース
{
    public function アップロードする(ファイル $ファイル, 商品ID $商品id): ?ファイル
    {
        if ($ファイル === null) {
            return null;
        }

        $ファイル->ファイルを保存する();
        if (!$ファイル->保存に成功したか()) {
            return null;
        }

        return $ファイル;
    }
}
