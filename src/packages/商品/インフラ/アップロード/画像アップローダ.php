<?php

declare(strict_types=1);

namespace 商品\インフラ\アップロード;

use 商品\ドメイン\モデル\アップロード\ファイル;
use 商品\ドメイン\モデル\アップロード\画像アップローダインターフェース;

class 画像アップローダ implements 画像アップローダインターフェース
{
    public function ストレージに送信する(ファイル $ファイル): ?ファイル
    {
        if ($ファイル === null) {
            return null;
        }

        $ファイル->ファイルを保存する();
        if (!$ファイル->保存に成功したか？()) {
            return null;
        }

        return $ファイル;
    }
}
