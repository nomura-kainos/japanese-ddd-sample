<?php
declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル;

class 詳細ビューモデル
{
    private int $id;
    private string $名前;
    private int $レンタル料金;

    public function __construct(int $id, string $名前, int $レンタル料金)
    {
        $this->id = $id;
        $this->名前 = $名前;
        $this->レンタル料金 = $レンタル料金;
    }

    public function id(): string
    {
        return (string)$this->id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function レンタル料金(): string
    {
        return number_format($this->レンタル料金);
    }
}
