<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\エンティティ;

class SNSアカウント extends エンティティ
{
    private string $SNS名;
    private string $id;
    private string $メール;

    public function __construct(string $SNS名, string $id, string $メール)
    {
        parent::ユニークキーを設定する($SNS名 . $id);
        $this->SNS名 = $SNS名;
        $this->id = $id;
        $this->メール = $メール;
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
