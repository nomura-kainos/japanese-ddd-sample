<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\エンティティ;
use 共通\ユニークキー\複合ユニークキー;

class SNSアカウント extends エンティティ
{
    public function __construct(
        private string $SNS名,
        private string $id,
        private ?string $メール = null
    ) {
        parent::ユニークキーを設定する(new 複合ユニークキー($SNS名, $id));
    }

    public function SNS名(): string
    {
        return $this->SNS名;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function メール(): string
    {
        return $this->メール;
    }
}
