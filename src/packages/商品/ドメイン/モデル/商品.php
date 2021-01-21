<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル;

use 共通\エンティティ;
use 共通\配列コピー\ディープコピー;
use 共通\集約ルート;
use 商品\ドメイン\モデル\アップロード\ファイル;
use 商品\ドメイン\モデル\アップロード\画像アップローダインターフェース;

class 商品 extends エンティティ implements 集約ルート
{
    private string $名前;
    private レンタル料金 $レンタル料金;
    private array $アップロード済み複数ファイル = [];

    public function __construct(
        private 商品ID $id,
        string $名前,
        レンタル料金 $レンタル料金,
        private カテゴリ $カテゴリ
    ) {
        parent::ユニークキーを設定する($id);
        $this->名前を変更する($名前);
        $this->レンタル料金を変更する($レンタル料金);
    }

    public function id(): int
    {
        return $this->id->値;
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function レンタル料金(): int
    {
        return $this->レンタル料金->値;
    }

    public function カテゴリ(): カテゴリ
    {
        return $this->カテゴリ;
    }

    public function アップロード済み複数ファイル()
    {
        return $this->アップロード済み複数ファイル;
    }

    public function 名前を変更する(string $名前)
    {
        $this->名前 = $名前;
    }

    public function レンタル料金を変更する(レンタル料金 $レンタル料金)
    {
        $this->レンタル料金 = $レンタル料金;
    }

    public function 画像ファイルをストレージに保存する(画像アップローダインターフェース $画像アップローダ, array $複数画像ファイル)
    {
        $_複数画像ファイル = ディープコピー::実行($複数画像ファイル);

        foreach ($_複数画像ファイル as $画像ファイル) {
            $アップロード済みファイル = $画像アップローダ->ストレージに送信する(new ファイル($画像ファイル));
            $this->アップロード済み複数ファイル[] = $アップロード済みファイル;
        }
    }
}
