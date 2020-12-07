<?php

declare(strict_types=1);

namespace 特集\ドメイン\モデル\アップロード;

use 特集\ドメイン\モデル\特集ID;

interface 画像アップローダインターフェース
{
    public function アップロードする(ファイル $画像ファイル, 特集ID $特集id): ?ファイル;
}
