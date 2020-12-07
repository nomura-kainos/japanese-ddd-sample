<?php

declare(strict_types=1);

namespace 特集\ドメイン\モデル;

use 特集\インフラ\レスポンスデータ\タイトル画像レスポンスデータ;
use 特集\ドメイン\モデル\アップロード\ファイル;
use 特集\インフラ\レスポンスデータ\特集IDレスポンスデータ;

interface 特集リポジトリインターフェース
{
    public function 登録用に次の特集IDを取得する(): 特集IDレスポンスデータ;

    public function 保存(特集 $特集);

    public function 画像を保存(ファイル $ファイル, 特集ID $特集id);
}
