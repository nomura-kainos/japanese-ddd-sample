<?php
declare(strict_types=1);

namespace 商品\ドメイン\モデル;

class 商品ファクトリ
{
    public function 再構成する(商品ID $id, string $名前, レンタル料金 $レンタル料金)
    {
        return new 商品(
            $id,
            $名前,
            $レンタル料金
        );
    }
}
