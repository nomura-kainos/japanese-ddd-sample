<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル\カテゴリ;

class 大カテゴリ
{
    private string $名前;

    public function __construct(string $名前) {
        $this->名前 = '■' . $名前;
    }

    public function 名前(){
        return $this->名前;
    }
}
