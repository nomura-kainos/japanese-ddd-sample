<?php

declare(strict_types=1);

namespace 特集\ドメイン\モデル;

use 共通\エンティティ;
use 共通\ユニークキー\単一ユニークキー;
use 共通\集約ルート;
use 特集\ドメイン\モデル\アップロード\ファイル;
use 特集\ドメイン\モデル\アップロード\画像アップローダインターフェース;

class 特集 extends エンティティ implements 集約ルート
{
    private ファイル $アップロード済みファイル;

    public function __construct(
        private 特集ID $id,
        private string $タイトル,
        private string $本文
    ) {
        parent::ユニークキーを設定する($id);
    }

    public function id(): int
    {
        return $this->id->値;
    }

    public function タイトル(): string
    {
        return $this->タイトル;
    }

    public function 本文(): string
    {
        return $this->本文;
    }

    public function アップロード済みファイル()
    {
        return $this->アップロード済みファイル;
    }

    public function 画像ファイルをストレージに保存する(画像アップローダインターフェース $画像アップローダ, $画像ファイル)
    {
        $this->アップロード済みファイル = $画像アップローダ->ストレージに送信する(new ファイル($画像ファイル));
    }
}
