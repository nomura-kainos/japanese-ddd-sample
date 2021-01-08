<?php

declare(strict_types=1);

namespace 認証\インフラ\レスポンスデータ;

use 認証\インフラ\エロクアント\ユーザエロクアント;

class ユーザレスポンスデータ
{
    private int $id;
    private string $メール;
    private ?string $パスワード;

    public function __construct(
        ユーザエロクアント $ユーザ,
        private array $SNSアカウントコレクション = []
    ) {
        $this->id = $ユーザ->id;
        $this->メール = $ユーザ->email;
        $this->パスワード = $ユーザ->password;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function メール(): string
    {
        return $this->メール;
    }

    public function パスワード(): ?string
    {
        return $this->パスワード;
    }

    public function SNSアカウントコレクション(): array
    {
        return $this->SNSアカウントコレクション;
    }
}
