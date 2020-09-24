<?php
declare(strict_types=1);

namespace Tests\pakages\商品\ドメイン\モデル\基盤;

use Tests\TestCase;
use 商品\ドメイン\モデル\基盤\バリューオブジェクト;

class バリューオブジェクトテスト extends TestCase
{

    public function test_値が同じであれば同じオブジェクトとみなす()
    {
        $オブジェクト1 = バリューオブジェクト::作成(1);
        $オブジェクト2 = バリューオブジェクト::作成(1);

        $this->assertTrue($オブジェクト1->等しいか($オブジェクト2->値()));
    }

}
