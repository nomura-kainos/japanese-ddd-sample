<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\仕様;

class 最新カート仕様 implements 仕様
{
    private $ユーザid;
    private $最新日付;

    public function __construct(
        ユーザID $ユーザid
    ) {
        $this->ユーザid = $ユーザid;
    }

    public function 基準を設定する($複数カート)
    {
        $this->最新日付 = max(array_column($複数カート, 'created_at'));
    }

    public function 満たすか($カート): bool
    {
        if ($this->ユーザid->値 != $カート->ユーザid) {
            return false;
        }

        if ($this->最新日付 != $カート->created_at) {
           return false;
        }

        return true;
    }
}
