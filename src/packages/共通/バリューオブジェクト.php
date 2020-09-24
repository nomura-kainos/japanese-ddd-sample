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
    final public function 値()
    {
        return $this->値;
    }

    final public function 等しいか(self $バリューオブジェクト): bool
    {
        // 同じクラス、同じ属性、同じ値をすべて満たす場合に、等しいと判定される
        // https://www.php.net/manual/ja/language.oop5.object-comparison.php
        return $this == $バリューオブジェクト;
    }
}
