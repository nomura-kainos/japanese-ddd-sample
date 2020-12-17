<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル;

use 共通\エンティティ;
use 共通\集約ルート;

class 商品カテゴリ extends エンティティ implements 集約ルート
{
    private 商品カテゴリID $id;
    private string $名前;

    public function __construct(商品カテゴリID $id, string $名前)
    {
        parent::ユニークキーを設定する($id);
        $this->id = $id;
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
