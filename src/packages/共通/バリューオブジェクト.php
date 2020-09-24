<?php
declare(strict_types=1);

namespace 共通;

class バリューオブジェクト
{
    private $値;

    public function __construct($値)
    {
        $this->値 = $値;
    }

    /*
     * 取得メソッドのみ
     *
     * 変更メソッドの追加は禁止
     */
    public function 値()
    {
        return $this->値;
    }

    public function 等しいか($値): bool
    {
        return $this->値 === $値;
    }
}
