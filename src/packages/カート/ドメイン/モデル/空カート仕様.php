<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\仕様\検証;
use 共通\配列コピー\ディープコピー;

class 空カート仕様 implements 検証
{
    public function __construct(
        private カートクエリサービスインターフェース $カートクエリ,
    ) {
    }

    public function 満たすか？($カート): bool
    {
        if ($カート === null) {
            return true;
        }

        $カート内複数商品 = $this->カートクエリ->カート内商品を全件取得(new カートID($カート->id()))->取得();
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
        $_未注文商品 = ディープコピー::実行($未注文商品);

        if (count($_未注文商品) > 0) {
            return false;
        }
        return true;
    }
}
