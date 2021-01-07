<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\エンティティ;
use 共通\集約ルート;

class ユーザ extends エンティティ implements 集約ルート
{
    public function __construct(
        private ユーザID $id,
        private string $メール,
        private ?string $パスワード,
        private array $SNSアカウントコレクション = []
    ) {
        parent::ユニークキーを設定する($id);
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

    public function SNSアカウントコレクション(): array
    {
        return $this->SNSアカウントコレクション;
    }

    public function 紐付け済みSNSアカウントを追加する(string $SNS名, string $SNSアカウントid)
    {
        $this->SNSアカウントコレクション[] = new SNSアカウント($SNS名, $SNSアカウントid);
    }
}
