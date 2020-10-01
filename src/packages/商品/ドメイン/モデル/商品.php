<?php

declare(strict_types=1);

namespace 商品\ドメイン\モデル;

use 共通\エンティティ;

class 商品 extends エンティティ
{

    private 商品ID $id;
    private string $名前;
    private レンタル料金 $レンタル料金;

    public function __construct(商品ID $id, string $名前, レンタル料金 $レンタル料金)
    {
        parent::ユニークキーを設定する($id);
        $this->id = $id;
        $this->名前 = $名前;
        $this->レンタル料金 = $レンタル料金;
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

    public function 名前を変更する(string $名前)
    {
        $this->名前 = $名前;
    }

    public function レンタル料金を変更する(レンタル料金 $レンタル料金)
    {
        $this->レンタル料金 = $レンタル料金;
    }
}
