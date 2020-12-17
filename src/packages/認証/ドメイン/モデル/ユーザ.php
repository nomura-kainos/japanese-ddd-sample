<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\エンティティ;
use 共通\集約ルート;

class ユーザ extends エンティティ implements 集約ルート
{
    private ユーザID $id;
    private string $メール;
    private ?string $パスワード;

    public function __construct(ユーザID $id, string $メール, ?string $パスワード)
    {
        parent::ユニークキーを設定する($id);
        $this->id = $id;
        $this->メール = $メール;
        $this->パスワード = $パスワード;
    }

    public function id(): int
    {
        return $this->id->値;
    }

    public function メール(): string
    {
        return $this->メール;
    }

    public function パスワード(): ?string
    {
        return $this->パスワード;
    }
}
