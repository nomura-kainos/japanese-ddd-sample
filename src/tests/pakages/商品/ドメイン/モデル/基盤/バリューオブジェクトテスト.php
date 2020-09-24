<?php
declare(strict_types=1);

namespace Tests\pakages\商品\ドメイン\モデル\基盤;

use Tests\TestCase;
use 商品\ドメイン\モデル\基盤\バリューオブジェクト;

class バリューオブジェクトテスト extends TestCase
{
    /*
     * バリューオブジェクトの仕様を説明するために作成したが、テストできないためテストをスキップする
     */
    public function test_オブジェクトは不変のため、オブジェクトの値を変更できないこと()
    {
        $this->markTestSkipped();

        $オブジェクト1 = new バリューオブジェクト(1);
        $オブジェクト1->値 = 2;
    }
}
