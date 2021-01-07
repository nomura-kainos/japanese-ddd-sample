<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\仕様\検証;

class 空カート仕様 implements 検証
{
    private $カートリポ;

    public function __construct(
        カートリポジトリインターフェース $カートリポ
    ) {
        $this->カートリポ = $カートリポ;
    }

    public function 満たすか？($カート): bool
    {
        if ($カート === null) {
            return true;
        }

        $カート内複数商品 = $this->カートリポ->カート内商品を全件取得(new カートID($カート->id()))->取得();
        $未注文商品 = array_filter($カート内複数商品, function ($カート内商品) {
            return !$カート内商品->注文済みか？();
        });
        if ($this->全て注文済みか？($未注文商品)) {
            return true;
        }

        return false;
    }

    private function 全て注文済みか？(array $未注文商品): bool
    {
        if (count($未注文商品) > 0) {
            return false;
        }
        return true;
    }
}
