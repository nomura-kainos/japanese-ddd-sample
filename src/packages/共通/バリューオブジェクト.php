<?php

declare(strict_types=1);

namespace 共通;

/**
 * 注意 バリューオブジェクトtraitを使用するクラスは
 * phpstormにプロパティの入力補完を追加するために、
 * @property-readを追加すること
 */
trait バリューオブジェクト
{
    /*
     * バリューオブジェクトの値は不変のため、参照メソッドのみ提供
     *
     * 参照メソッドを用意しなくてもuseバリューオブジェクトをすることでプロパティに参照できる
     * 値は変更不可のため、__setメソッドは禁止
     * 本来は、privateプロパティにアクセスできることは良くないが、readonlyの代用で実装が簡単な方法がなかったためtraitを使用
     * https://qiita.com/0w0/items/fa927961a54c9bb7a66b#%E9%9D%A2%E5%80%92%E3%81%AA%E3%81%AE%E3%81%A7getter%E3%82%92%E5%85%B1%E9%80%9A%E5%8C%96%E3%81%99%E3%82%8B
     */
    public function __get($プロパティ名)
    {
        return $this->$プロパティ名;
    }

    final public function 等しいか(self $バリューオブジェクト): bool
    {
        // 同じクラス、同じ属性、同じ値をすべて満たす場合に、等しいと判定される
        // https://www.php.net/manual/ja/language.oop5.object-comparison.php
        return $this == $バリューオブジェクト;
    }
}
