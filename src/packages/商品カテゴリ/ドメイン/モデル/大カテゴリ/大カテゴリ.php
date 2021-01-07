<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル\大カテゴリ;

use 共通\エンティティ;
use 共通\集約ルート;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリID;

class 大カテゴリ extends エンティティ implements 集約ルート
{
    private string $名前;

    public function __construct(private 商品カテゴリID $id, string $名前)
    {
        parent::ユニークキーを設定する($id);
        $this->名前を変更する($名前);
    }

    public function id(): int
    {
        return $this->id->値;
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function 名前を変更する(string $名前)
    {
        $this->名前 = $名前;
    }
}
